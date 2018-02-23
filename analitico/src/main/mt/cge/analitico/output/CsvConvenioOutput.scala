package mt.cge.analitico.output

import java.io.FileWriter
import java.io.BufferedWriter
import java.io.File
import mt.cge.analitico.model.Convenio

class CsvConvenioOutput(val fileName: String) {
  
  def save(convenios:List[Convenio]) {
    val bw = createWriter(fileName)
    bw.write("ID,UNIDADE,CONVENIADA,MUNICIPIO,PROGRAMA,AÇÃO,OBJETO,NUMERO,INI,FIM,VL.CONVENIO,VL.CONTRAPARTE;\n")
    convenios.foreach { (convenio) =>
      bw.write( 
          convenio.id + "," +
          convenio.unidade + ","  +
          convenio.conveniada +  "," +
          convenio.municipio + "," +
          convenio.objeto + "," +
          convenio.programa + "," +
          convenio.acao + "," +
          convenio.numero + "," +
          convenio.inicio + "," +
          convenio.fim + "," +
          
          // Remove as casas decimais
          convenio.valorConvenio.toString.replaceAll("\\..*","") + "," +
          convenio.valorContraparte.toString.replaceAll("\\..*","") + ";"   
          + "\n"
      )      
    }
    bw.close()
  }

  private [this] def createWriter(name:String) =
     new BufferedWriter(new FileWriter(new File(fileName))) 

}

object CsvConvenioOutput {
  def apply(fileName:String) = new CsvConvenioOutput(fileName)
}
