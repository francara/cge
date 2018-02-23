package mt.cge.analitico.input

import org.junit.Assert.assertEquals
import org.junit.Assert.assertTrue
import org.slf4j.LoggerFactory
import junit.framework.TestCase;

class SisConHtmlParserTest extends TestCase {
  val logger = LoggerFactory.getLogger(this.getClass)

  def testParse() {
    var parser = SisConHtmlParser("/home/francara/dev/cge/analitico/data/secid.html")
    assertEquals(328, parser.records.size)
  }
}