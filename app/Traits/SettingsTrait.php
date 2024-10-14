<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;

trait SettingsTrait
{

    /**
     * @param string $primary
     * @param mixed $customCSS
     * @param string|null $secondary
     * @param string|null $font
     * @return void
     */
    public function createCSS( string $primary, string $customCSS = null, string $secondary = null, string $font = null){
        $base = File::get('app/css/skins/default.txt');
        $content = str_replace(
            array("#colorPrimary","#colorSecondary","#font"),
            array($primary,$secondary,$font),
            $base);
        $content .= $customCSS;
        File::delete('app/css/skins/default.css');
        File::put('app/css/skins/default.css', $content);
    }

    /**
     * @param bool $https
     * @param mixed $content
     * @return void
     */
    public function createHtaccess(bool $https, mixed $content)
    {
        $htaccess = "<IfModule mod_rewrite.c>\n";
        $htaccess .= "\t<IfModule mod_negotiation.c>\n";
        $htaccess .= "\t\tOptions -MultiViews\n";
        $htaccess .= "\t</IfModule>\n";
        $htaccess .= "\n";
        $htaccess .= "\tRewriteEngine On\n";
        $htaccess .= "\n";
        $htaccess .= "RewriteCond %{THE_REQUEST} /index\.php [NC]\n";
        $htaccess .= "RewriteRule ^(.*?)index\.php[^/] /$1? [L,R=302,NC,NE]\n";
        $htaccess .= "\n";
        $htaccess .= "RewriteCond %{THE_REQUEST} /index\.php [NC]\n";
        $htaccess .= "RewriteRule ^(.*?)index\.php(?:/(.*))?$ /$1$2? [L,R=302,NC,NE]\n";
        $htaccess .= "\n";
        $htaccess .= "\t# Redirect Trailing Slashes If Not A Folder...\n";
        $htaccess .= "\tRewriteCond %{REQUEST_FILENAME} !-d\n";
        $htaccess .= "\tRewriteRule ^(.*)/$ /$1 [L,R=301]\n";
        $htaccess .= "\n";
        $htaccess .= "\t# Handle Authorization Header\n";
        if ($https) {
            $htaccess .= "\tRewriteCond %{HTTPS} !=on\n";
            $htaccess .= "\tRewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n\n";
        } else{
            $htaccess .= "\tRewriteCond %{HTTP:Authorization} .\n";
            $htaccess .= "\tRewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]\n\n";
        }
        $htaccess .= "\n\n";
        $htaccess .= "\t# Handle Front Controller...\n";
        $htaccess .= "\tRewriteCond %{REQUEST_FILENAME} !-d\n";
        $htaccess .= "\tRewriteCond %{REQUEST_FILENAME} !-f\n";
        $htaccess .= "\tRewriteRule ^ index.php [L]\n\n";

        $text = file_get_contents('https://raw.githubusercontent.com/mitchellkrogza/apache-ultimate-bad-bot-blocker/master/_htaccess_versions/htaccess-mod_rewrite.txt');
        $htaccess .= "\n";
        $htaccess .= "\t## Robots ##\n";
        $htaccess .= "\tRewriteCond %{REQUEST_URI} !/robots.txt$\n\n";
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
            if (str_contains($line, 'RewriteCond %{HTTP_USER_AGENT}') || str_contains($line, 'RewriteCond %{HTTP_REFERER}')) {
                $htaccess .= "\t".$line."\n";
            }
        }
        $htaccess .= File::get('app/htaccess/ending.txt');
        $htaccess .= "\n\n";
        $htaccess .= "\t##### Custom rules #####\n\n";
        $htaccess .= $content;

        if (File::exists('.htaccess')) {
            File::delete('.htaccess');
        }
        File::put('.htaccess', $htaccess);
    }

    /**
     * @return void
     */
    public function createRobots()
    {
        $robots = "Sitemap: ".url('/')."/sitemap.xml\n\n";
        $robots .= "User-agent: *\n";
        $robots .= "Disallow: /*close-popup*\n";
        $robots .= "Disallow: /leadseo\n";
        $robots .= "Disallow: /set-up\n";
        $robots .= "Disallow: /password/reset\n";
        $robots .= " \n";
        $robots .= "User-agent: MJ12bot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: SurveyBot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: rogerbot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: AhrefsBot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: BLEXBot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: archive-fr.com\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: webmeupbot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: spbot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: Updownerbot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: VoilaBot BETA 1.2\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: LinkedInBot/1.0\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: MLBot\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: Majestic12\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: MajesticSEO\n";
        $robots .= "Disallow: /\n";
        $robots .= "User-agent: Majestic-SEO\n";
        $robots .= "Disallow: /\n";
        $robots .= " \n";
        if (File::exists('robots.txt')) {
            File::delete('robots.txt');
        }
        File::put('robots.txt', $robots);
    }
}
