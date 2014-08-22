<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:variable name="url" select="/data/config/url"/>
    <xsl:variable name="user">
        <xsl:choose>
            <xsl:when test="/data/config/user = ''">Guest</xsl:when>
            <xsl:otherwise>
                <xsl:value-of select="/data/config/user"/>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:variable>


</xsl:stylesheet>