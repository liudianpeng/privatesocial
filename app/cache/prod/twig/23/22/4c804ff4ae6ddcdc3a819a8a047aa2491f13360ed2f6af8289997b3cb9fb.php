<?php

/* SlackissAVShareBundle:layout:base.html.twig */
class __TwigTemplate_23224c804ff4ae6ddcdc3a819a8a047aa2491f13360ed2f6af8289997b3cb9fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <!-- Bootstrap -->
    <link rel=\"stylesheet\" href=\"http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js\"></script>
        <script src=\"http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js\"></script>
    <![endif]-->
    ";
        // line 15
        $this->displayBlock('header', $context, $blocks);
        // line 16
        echo "  </head>
  <body>
    ";
        // line 18
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=\"http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js\"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src=\"http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js\"></script>

    ";
        // line 25
        $this->displayBlock('footer', $context, $blocks);
        // line 26
        echo "  </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 15
    public function block_header($context, array $blocks = array())
    {
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
    }

    // line 25
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SlackissAVShareBundle:layout:base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  81 => 25,  76 => 18,  71 => 15,  66 => 4,  60 => 26,  58 => 25,  50 => 19,  48 => 18,  44 => 16,  42 => 15,  28 => 4,  23 => 1,);
    }
}
