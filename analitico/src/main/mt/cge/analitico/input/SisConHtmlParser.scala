package mt.cge.analitico.input

import java.io.File
import org.slf4j.LoggerFactory
import org.jsoup.nodes.Document
import org.jsoup.Jsoup
import scala.collection.convert.wrapAsScala._
import scala.collection.mutable.ListBuffer
import mt.cge.analitico.model.Convenio


case class SisConHtmlParser(val fileName:String) {
  
  private[this] val logger = LoggerFactory.getLogger(this.getClass)
  private[this] val file : File = new File(fileName)
  
  private[this] val doc:Document = Jsoup.parse(file, "ISO-8859-1", "http://example.com/")

  private[this] val tables = doc.select("#tbConvenios")
  logger.debug(s"Returned tables:" + tables.size())
  
  private[this] val lines = ListBuffer.empty[Convenio]
  private[this] val numLines = tables.get(0).select("tr").size()
  tables.get(0).select("tr").zipWithIndex.filter { case (line, index) => index > 0 && index < numLines-1 }
    .foreach { case (line, index) =>
      val cols = line.select("td")
      
      val id = cols.get(0).text().toInt
      val unidade = cols.get(1).text()
      val conveniada = sanitize(cols.get(2).text())
      val municipio = cols.get(3).text()
      val objeto = sanitize(cols.get(4).text())
      val programa = cols.get(5).text().toInt
      val acao = cols.get(6).text().toInt
      val numero = cols.get(7).text()
      val vigencia = cols.get(8).text()
      val valorConvenio = cols.get(9).text().replaceAll("\\.","").replaceAll(",","\\.").toDouble
      val valorContraparte = cols.get(10).text().replaceAll("\\.","").replaceAll(",","\\.").toDouble
      
      val pattern = ".*(\\d\\d/\\d\\d/\\d\\d\\d\\d).*(\\d\\d/\\d\\d/\\d\\d\\d\\d).*".r
      val pattern(inicio, fim) = vigencia
      logger.debug(s"id:$id - valor:$valorConvenio - contraparte:$valorContraparte - $inicio => $fim")
      
      lines += Convenio(
          id, unidade, conveniada, municipio, objeto, 
          programa, acao, numero, inicio, fim, 
          valorConvenio, valorContraparte 
      )      
    }    
    
    val records = lines.toList
    
    private[this] def sanitize(record:String) : String = record.replaceAll(",","").replaceAll(";",".")
}

