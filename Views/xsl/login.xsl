<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:php="http://php.net/xsl"
                xsl:extension-element-prefixes="php"
        >


    <xsl:template name="loginPage">
        <div class="wrapper">
            <h2>Login</h2>
            <form method="post" action="/">
                <input type="text" name="login-username"/>
                <input type="password" name="login-password"/>
                <input type="submit" name="action-user-login"/>
            </form>
        </div>
        <xsl:value-of select="php:functionString('Bootstrap::what')"/>
    </xsl:template>
</xsl:stylesheet>