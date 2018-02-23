package mt.cge.analitico.stat

import org.junit.Assert.assertEquals
import org.junit.Assert.assertTrue
import org.slf4j.LoggerFactory
import junit.framework.TestCase;
import mt.cge.analitico.output.XlsOutput
import mt.cge.analitico.model.Convenio

class ConvenioCountTest extends TestCase {
  val logger = LoggerFactory.getLogger(this.getClass)

  def testCount() {
    val convenios = List(
        Convenio(1, "secid", "XPTO", "Cuiabá", "Compra de lápis", 1, 1,  "1/2017", "01/01/2016", "12/12/2018", 120.00, 11.00),
        Convenio(2, "secid", "XPTO_2", "Cuiabá", "Compra de Borracha", 1, 2, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00),
        Convenio(3, "secid", "XPTO_2", "Cáceres", "Compra de Borracha", 1, 2, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00),
        Convenio(4, "secid", "XPTO_3", "Poconé", "Compra de Borracha", 2, 1, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00),
    )
    
    assertEquals(2, MunicipioCount(convenios).municipios("Cuiabá"))
    assertEquals(1, MunicipioCount(convenios).municipios("Cáceres"))    
    assertEquals(1, MunicipioCount(convenios).municipios("Poconé"))
    
    assertEquals(1, AcaoCount(convenios).acoes((1,1)))
    assertEquals(2, AcaoCount(convenios).acoes((1,2)))
    assertEquals(1, AcaoCount(convenios).acoes((2,1)))    
    
  }
}