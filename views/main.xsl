<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:include href="setup.xsl"/>
    <xsl:template match="/">
        <html>
            <body>
                <header>
                    <xsl:call-template name="navigation"/>
                </header>

                <section>
                    <div id="content">
                        <xsl:choose>
                            <xsl:when test="$url = '/'">
                                <xsl:call-template name="frontPage"/>
                            </xsl:when>
                            <xsl:otherwise>
                                <xsl:call-template name="subPage"/>
                            </xsl:otherwise>
                        </xsl:choose>
                    </div>
                </section>


            </body>
        </html>
    </xsl:template>

    <xsl:template name="frontPage">
        <h1>This is the frontpage HTML design patterns</h1>
    </xsl:template>

    <xsl:template name="subPage">
        <h2>This is the subpage HTML design patterns</h2>
    </xsl:template>

    <xsl:template name="navigation">
        <nav>
            <ul>
                <li>
                    <a>Test</a>
                </li>
                <li>
                    <a>Test</a>
                </li>
                <li>
                    <a>Test</a>
                </li>
                <li>
                    <a>Test</a>
                </li>
                <li>
                    <a>Test</a>
                </li>
            </ul>
        </nav>
    </xsl:template>

</xsl:stylesheet>