<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:variable name="url" select="/data/url"/>
    <xsl:variable name="user">
        <xsl:choose>
            <xsl:when test="/data/user = ''">Guest</xsl:when>
            <xsl:otherwise>
                <xsl:value-of select="/data/user"/>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:variable>


</xsl:stylesheet>