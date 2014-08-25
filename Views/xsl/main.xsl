<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:php="http://php.net/xsl"
                xsl:extension-element-prefixes="php"
        >
<xsl:output method="html" />


<xsl:include href="menu.xsl"/>
<xsl:include href="setup.xsl"/>
<xsl:include href="404.xsl"/>
<xsl:include href="login.xsl"/>


    <xsl:template match="/">
        <html>
            <head>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="{$js}html5.js"></script>
                <script src="{$js}countup.js"></script>
                <script src="{$js}toolbox.js"></script>
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'></link>
                <link href="{$css}unsemantic-grid-responsive-no-ie7.css" rel="stylesheet" type='text/css'></link>
                <link href="{$css}jquery.countup.css" rel="stylesheet" type='text/css'></link>
                <link href="{$css}styles.css" rel="stylesheet" type='text/css'></link>
            </head>
            <body>
                <xsl:choose>
                    <xsl:when test="$user = 'Guest'">
                        <xsl:call-template name="loginPage"/>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:call-template name="showPage"/>
                    </xsl:otherwise>
                </xsl:choose>
            </body>
        </html>
    </xsl:template>

    <xsl:template name="frontPage">
        <h1>This is the frontpage HTML design patterns</h1>
    </xsl:template>

    <xsl:template name="subPage">
        <h2>This is the subpage HTML design patterns</h2>
    </xsl:template>


    <xsl:template name="showPage">
        <div class="top">
            <div class="wrapper">
                <div class="grid-50 mobile-grid-100">
                    <div id="logo">
                        <a href="/">
                            <!-- Insert logo -->
                            Logo here
                            <img/>
                        </a>
                    </div>
                </div>
                <div class="grid-50 mobile-grid-100">
                    <xsl:call-template name="menu"/>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="content">
            <div class="wrapper">
                <div class="tracker">
                    <form method="post" class="startTracking" autocomplete="off">
                        <div class="grid-20 mobile-grid-100">
                            <input type='text' name='tracking-name'/>
                        </div>
                        <div class="grid-15 mobile-grid-100">
                            <div id="addToProject">
                                + add to project
                            </div>
                        </div>
                        <div class="grid-15 mobile-grid-100">
                            <div id="timer">
                            </div>
                            <!-- Maybe -->
                            <input type="hidden" name="tracking-hours" value="00"/>
                            <input type="hidden" name="tracking-minutes" value="00"/>
                        </div>
                        <div class="grid-30 mobile-grid-100">
                            <input type="submit" name='action-tracking-startTracking' value='Start'/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </xsl:template>

</xsl:stylesheet>