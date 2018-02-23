package mt.cge.analitico.input

import org.slf4j.LoggerFactory

import junit.framework.TestCase
import mt.cge.analitico.model.Convenio
import mt.cge.analitico.output.CsvConvenioOutput
import mt.cge.analitico.output.CsvCountOutput
import mt.cge.analitico.stat.MunicipioCount
import mt.cge.analitico.stat.AcaoCount

class XlsOutputTest extends TestCase {
  val logger = LoggerFactory.getLogger(this.getClass)

  def testOutput() {
    val convenios = List(
        Convenio(1, "secid", "XPTO", "Cuiabá", "Compra de lápis", 1, 1,  "1/2017", "01/01/2016", "12/12/2018", 120.00, 11.00),
        Convenio(2, "secid", "XPTO_2", "Cuiabá", "Compra de Borracha", 1, 2, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00)
    )
    CsvConvenioOutput("/home/francara/dev/cge/analitico/data/test.csv")
      .save(convenios)
  }
  
  def testCount() {
    val convenios = List(
        Convenio(1, "secid", "XPTO", "Cuiabá", "Compra de lápis", 1, 1,  "1/2017", "01/01/2016", "12/12/2018", 120.00, 11.00),
        Convenio(2, "secid", "XPTO_2", "Cuiabá", "Compra de Borracha", 1, 2, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00),
        Convenio(3, "secid", "XPTO_2", "Cáceres", "Compra de Borracha", 1, 2, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00),
        Convenio(4, "secid", "XPTO_3", "Poconé", "Compra de Borracha", 2, 1, "2/2017", "01/07/2016", "12/12/2018", 120.00, 11.00),
    )
    CsvCountOutput("/home/francara/dev/cge/analitico/data/test-count.csv")
      .save(MunicipioCount(convenios), AcaoCount(convenios))  
  }
}