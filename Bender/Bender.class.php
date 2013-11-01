<?php
/**
 * @author Alex Raven
 * @company ESITEQ
 * @website http://www.esiteq.com/
 * @email bugrov at gmail.com
 * @created 29.10.2013
 * @version 0.2
 * improved by Rolland (rolland at alterego.biz.ua)
 */

class Bender
{
    // CSS minifier
    public $cssmin = "cssmin";
    // JS minifier, can be "packer" or "jshrink"
    public $jsmin = "packer";
    // Packed file time to live in sec (-1 = never recompile, 0 = always recompile, default: 3600)
    public $ttl = 3600;
    // Project's root dir
    public $root_dir;
    // Constructor
    private $version_key = 'v';
    public function __construct()
    {
        $this->root_dir = defined( 'ROOT_DIR' ) ? ROOT_DIR : $_SERVER['DOCUMENT_ROOT'];
    }
    // Enqueue CSS or Javascript
    public function enqueue( $src )
    {
        global $_javascripts, $_stylesheets;
        if ( !is_array( $src ) )
        {
            $src = array( $src );
        }
        foreach ( $src as $s )
        {
            switch ( $this->get_ext( $s ) )
            {
                case "css":
                    $_stylesheets[] = $s;
                    break;
                case "js":
                    $_javascripts[] = $s;
                    break;
            }
        }
    }
    // Minify CSS / Javascripts and write output
    protected function minify( $scripts, $ext, $output )
    {
        $path = $this->root_dir();
        $outfile = "{$path}/{$output}";
        if ( file_exists( $outfile ) )
        {
            if ( $this->ttl == -1 )
            {
                // never recompile
                return true;
            }
            $fileage = time() - filemtime( $outfile );
            if ( $fileage < $this->ttl )
            {
                return true;
            }
        }
        $str = $this->join_files( $scripts );
        switch ( $ext )
        {
            case "css":
                switch ( $this->cssmin )
                {
                    case "cssmin":
                        require_once realpath( dirname( __file__ ) . "/cssmin.php" );
                        $packed = CssMin::minify( $str );
                        break;
                    default:
                        $packed = $str;
                }
                break;
            case "js":
                switch ( $this->jsmin )
                {
                    case "packer":
                        require_once realpath( dirname( __file__ ) ) . "/class.JavaScriptPacker.php";
                        $packer = new JavaScriptPacker( $str, "Normal", true, false );
                        $packed = $packer->pack();
                        break;
                    case "jshrink":
                        require_once realpath( dirname( __file__ ) ) . "/JShrink.class.php";
                        $packed = Minifier::minify( $str );
                        break;
                    default:
                        $packed = $str;
                }
                break;
        }
        file_put_contents( $outfile, $packed );
    }
    // Print output for CSS or Javascript
    public function output( $output )
    {
        $output = ltrim( $output, './' );
        global $_javascripts, $_stylesheets;
        switch ( $this->get_ext( $output ) )
        {
            case "css":
                $this->check_recombine( $output, $_stylesheets );
                $this->minify( $_stylesheets, "css", $output );
                return '<link href="' . $this->get_src( $output ) . '" rel="stylesheet" type="text/css"/>';
                break;
            case "js":
                $this->check_recombine( $output, $_javascripts );
                $this->minify( $_javascripts, "js", $output );
                return '<script type="text/javascript" src="' . $this->get_src( $output ) . '"></script>';
                break;
        }
    }
    // Get root dir
    protected function root_dir()
    {
        return $this->root_dir;
    }
    // Join array of files into a string
    protected function join_files( $files )
    {
        $path = $this->root_dir();
        if ( !is_array( $files ) )
        {
            return "";
        }
        $c = "";
        foreach ( $files as $file )
        {
            $c .= file_get_contents( "{$path}/{$file}" );
        }
        return $c;
    }
    // Get extension in lowercase
    protected function get_ext( $src )
    {
        return strtolower( pathinfo( $src, PATHINFO_EXTENSION ) );
    }
    /**
     * Gheck if need to recombine output file
     */
    protected function check_recombine( $output, $files )
    {
        $path = $this->root_dir();
        $outfile = "{$path}/{$output}";
        if ( !file_exists( $outfile ) || !is_array( $files ) )
        {
            return;
        }
        // find last modify time of src
        $last = 0;
        foreach ( $files as $file )
        {
            if ( ( $_time = filemtime( $path . "/" . $file ) ) > $last )
                $last = $_time;
        }
        if ( filemtime( $outfile ) < $last )
        {
            // need to be recombined
            $this->ttl = 0;
        }
        else
        {
            $this->ttl = -1;
        }
    }

    /**
     * returns src for resource due to filemtime
     */
    protected function get_src( $output )
    {
        $path = $this->root_dir();
        return '/' . $output . '?' . $this->version_key . '=' . filemtime( $path . "/" . $output );
    }

}
?>