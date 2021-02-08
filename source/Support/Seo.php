<?php

namespace Source\Support;

use SimpSyst\Improve\Improve;

/**
 * BTDAM | Class Seo
 *
 * @author Diego Matos <oi@diegomatos.com>
 * @package Source\Support
 */
class Seo
{
    /** @var Improve */
    protected $improver;

    /**
     * Seo constructor.
     * @param string $schema
     */
    public function __construct(string $schema = "article")
    {
        $this->improver = new Improve();
        $this->improver->openGraph(
            CONF_SITE_NAME,
            CONF_SITE_LANG,
            $schema
        )->twitterCard(
            CONF_SOCIAL_TWITTER_CREATOR,
            CONF_SOCIAL_TWITTER_PUBLISHER,
            CONF_SITE_DOMAIN
        )->publisher(
            CONF_SOCIAL_FACEBOOK_PAGE,
            CONF_SOCIAL_FACEBOOK_AUTHOR,
            CONF_SOCIAL_GOOGLE_PAGE,
            CONF_SOCIAL_GOOGLE_AUTHOR
        )->facebook(
            CONF_SOCIAL_FACEBOOK_APP
        );
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->improver->data()->$name;
    }

    /**
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string $image
     * @param bool $follow
     * @return string
     */
    public function render(string $title, string $description, string $url, string $image, bool $follow = true): string
    {
        return $this->improver->improver($title, $description, $url, $image, $follow)->render();
    }

    /**
     * @return Improver
     */
    public function improver(): Improver
    {
        return $this->improver;
    }

    /**
     * @param string|null $title
     * @param string|null $desc
     * @param string|null $url
     * @param string|null $image
     * @return null|object
     */
    public function data(?string $title = null, ?string $desc = null, ?string $url = null, ?string $image = null)
    {
        return $this->improver->data($title, $desc, $url, $image);
    }
}