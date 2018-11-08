<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML><BODY>
	<TABLE border="1">
		<THEAD><TR><TH>Egilea</TH><TH>Gaia</TH><TH>Enuntziatua</TH><TH>Erantzuna</TH><TH>Faltsuak</TH></TR></THEAD>
		<xsl:for-each select="/assessmentItems/assessmentItem" >
			<TR>
				<TD>
					<FONT SIZE="2" COLOR="black" FACE="Verdana">
						<xsl:value-of select="@author"/> <BR/>
					</FONT>
				</TD>
				<TD>
					<FONT SIZE="2" COLOR="pink" FACE="Verdana">
						<xsl:value-of select="@subject"/> <BR/>
					</FONT>
				</TD>
				<TD>
					<FONT SIZE="2" COLOR="blue" FACE="Verdana">
						<xsl:value-of select="itemBody/p"/> <BR/>
					</FONT>
				</TD>
				<TD>
					<FONT SIZE="2" COLOR="green" FACE="Verdana">
						<xsl:value-of select="correctResponse/value"/> <BR/>
					</FONT>
				</TD>
				<TD>
					<FONT SIZE="2" COLOR="red" FACE="Verdana">
						<xsl:value-of select="incorrectResponses/value[1]"/> <BR/>
						<xsl:value-of select="incorrectResponses/value[2]"/> <BR/>
						<xsl:value-of select="incorrectResponses/value[3]"/> <BR/>
					</FONT>
				</TD>
			</TR>
		</xsl:for-each>
	</TABLE>
</BODY></HTML>
</xsl:template>
</xsl:stylesheet>