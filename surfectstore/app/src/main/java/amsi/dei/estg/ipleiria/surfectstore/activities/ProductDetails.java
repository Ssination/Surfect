package amsi.dei.estg.ipleiria.surfectstore.activities;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.Manifest;
import android.app.Dialog;
import android.content.DialogInterface;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.itextpdf.text.BaseColor;
import com.itextpdf.text.Chunk;
import com.itextpdf.text.Document;
import com.itextpdf.text.Element;
import com.itextpdf.text.PageSize;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfWriter;
import com.itextpdf.text.pdf.draw.LineSeparator;
import com.zolad.zoominimageview.ZoomInImageView;

import java.io.FileOutputStream;
import java.text.SimpleDateFormat;
import java.util.Locale;
import java.util.Random;

import amsi.dei.estg.ipleiria.surfectstore.R;

public class ProductDetails extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private TextView nomeProduto, categoriaProduto, stockProduto, precoProduto, descricaoProduto;
    private ImageView fotoProduto;
    private RadioButton metodoPagamento;
    private Button efetuarCompra;
    int contador = 1;
    Dialog dialogCarrinho;
    private static final int STORAGE_CODE = 1000;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);

        // Pôr logotipo como imagem na ActionBar
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setLogo(R.drawable.logo2);
        getSupportActionBar().setDisplayUseLogoEnabled(true);

        final String _nomeProduto = getIntent().getExtras().getString("nomeProduto");
        final int _precoProduto = getIntent().getExtras().getInt("precoProduto");
        int _stockProduto = getIntent().getExtras().getInt("stockProduto");
        String _descricaoProduto = getIntent().getExtras().getString("descricaoProduto");
        int _categoriaProduto = getIntent().getExtras().getInt("categoriaProduto");
        final String _fotoProduto = getIntent().getExtras().getString("fotoProduto");

        inicializeComponents();

        nomeProduto.setText(_nomeProduto);
        categoriaProduto.setText("Categoria: " + _categoriaProduto);
        stockProduto.setText("Em stock: " + _stockProduto);
        precoProduto.setText("" + _precoProduto);
        descricaoProduto.setText(_descricaoProduto);
        Glide.with(this).load(_fotoProduto).into(fotoProduto);

        dialogCarrinho = new Dialog(this);
        efetuarCompra.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {dialogCarrinho.setContentView(R.layout.dialog_add_cart);
                TextView carrinhoNome = (TextView) dialogCarrinho.findViewById(R.id.car_tvNomeProduto);
                TextView carrinhoPreco = (TextView)dialogCarrinho.findViewById(R.id.car_tvPrecoProduto);
                final TextView contadorQuantidade = (TextView)dialogCarrinho.findViewById(R.id.car_tvContador);
                ImageView adicionarQuantidade = (ImageView)dialogCarrinho.findViewById(R.id.car_imgAdd);
                final ImageView retirarQuantidade = (ImageView)dialogCarrinho.findViewById(R.id.car_imgRemove);
                ZoomInImageView carrinhoFoto = (ZoomInImageView)dialogCarrinho.findViewById(R.id.car_imgProduto);
                Spinner spinnerTamanhos = (Spinner)dialogCarrinho.findViewById(R.id.car_spinnerTamanho);
                Button comprar = (Button)dialogCarrinho.findViewById(R.id.car_btAdicionar);

                Glide.with(ProductDetails.this).load(_fotoProduto).into(carrinhoFoto);
                carrinhoNome.setText(_nomeProduto);
                carrinhoPreco.setText("Preço p/ item: " + _precoProduto + "€");

                ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(ProductDetails.this, R.array.tamanhos, R.layout.simple_spinner_item);
                adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                spinnerTamanhos.setAdapter(adapter);
                spinnerTamanhos.setOnItemSelectedListener(ProductDetails.this);

                adicionarQuantidade.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        contador++;
                        contadorQuantidade.setText(Integer.toString(contador));
                    }
                });

                retirarQuantidade.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        if(contador >= 2){
                            contador--;
                        }
                        contadorQuantidade.setText(Integer.toString(contador));
                    }
                });

                comprar.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        final AlertDialog.Builder builder = new AlertDialog.Builder(ProductDetails.this);
                        builder.setTitle("Comprar produto")
                                .setMessage("Tem a certeza que pretende comprar este produto?")
                                .setCancelable(true)
                                .setPositiveButton("Sim", new DialogInterface.OnClickListener() {
                                    @Override
                                    public void onClick(DialogInterface dialog, int which) {
                                        if(Build.VERSION.SDK_INT > Build.VERSION_CODES.M){
                                            if(checkSelfPermission(Manifest.permission.WRITE_EXTERNAL_STORAGE) == PackageManager.PERMISSION_DENIED){
                                                String[] permissions = {Manifest.permission.WRITE_EXTERNAL_STORAGE};
                                                requestPermissions(permissions, STORAGE_CODE);
                                            }
                                            else {
                                                savePdf();
                                            }
                                        } else {
                                            savePdf();
                                        }
                                    }
                                });
                        builder.setNegativeButton("Não", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                dialog.cancel();
                            }
                        });
                        AlertDialog alertDialog = builder.create();
                        alertDialog.show();
                    }
                });

                dialogCarrinho.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
                dialogCarrinho.show();
            }
        });
    }

    public void inicializeComponents(){

        nomeProduto = (TextView) findViewById(R.id.shop_produtoTvNomeProduto);
        categoriaProduto = (TextView) findViewById(R.id.shop_produtoTvCategoriaProduto);
        stockProduto = (TextView) findViewById(R.id.shop_produtoTvStockProduto);
        precoProduto = (TextView) findViewById(R.id.shop_produtoTvPrecoProduto);
        descricaoProduto = (TextView) findViewById(R.id.shop_produtoTvDescricaoProduto);
        fotoProduto = (ImageView) findViewById(R.id.shop_produtoFotoProduto);
        efetuarCompra = (Button)findViewById(R.id.shop_produtoAdicionar);
        metodoPagamento = (RadioButton)findViewById(R.id.car_rbMetodo);

    }

    public void savePdf() {

        // Criar objeto Documento
        Document fatura = new Document();
        // Nome da fatura
        String nomeFatura = "fatura" + new SimpleDateFormat("HHmmss",
                Locale.getDefault()).format(System.currentTimeMillis());
        // Diretoria da fatura
        String diretoriaFatura = Environment.getExternalStorageDirectory() + "/" + nomeFatura + ".pdf";

        try {
            //final TextView _quantidadeProduto = (TextView) findViewById(R.id.car_tvContador);
            String faturaQuantidadeProduto = Integer.toString(contador);
            String faturaNomeProduto = nomeProduto.getText().toString().trim();
            String faturaPrecoProduto = precoProduto.getText().toString().trim();
            //String faturaQuantidadeProduto = quantidadeProduto.getText().toString().trim();
            int valorQuantidade = Integer.parseInt(faturaQuantidadeProduto);
            int valorPreco = Integer.parseInt(faturaPrecoProduto);
            int valorTotal = valorPreco * valorQuantidade;
            final int minReferencia = 000000000;
            final int maxReferencia = 999999999;
            final int random = new Random().nextInt((maxReferencia - minReferencia) + 1) + minReferencia;

            // Breakline
            LineSeparator breakLine = new LineSeparator();
            breakLine.setLineColor(new BaseColor(Color.argb(0,0,0,0)));

            // ESTRUTURA DA FATURA
            // Instanciar o documento PdfWriter
            PdfWriter.getInstance(fatura, new FileOutputStream(diretoriaFatura));
            // Abrir o documento para escrever e definir o tamanho da página
            fatura.open();
            fatura.setPageSize(PageSize.A5);
            // TÍTULO DA FATURA
            // Adicionar título
            // Criar chunk
            Chunk chunkTitulo = new Chunk("SURFECT - The fusion between surf and perfection.");
            // Creiar parágrafo do título
            Paragraph tituloParagrafo = new Paragraph(chunkTitulo);
            // Alinhamento do título
            tituloParagrafo.setAlignment(Element.ALIGN_CENTER);
            // Adicionar o chunk à fatura
            fatura.add(tituloParagrafo);
            // Adicionar breakline
            fatura.add(new Paragraph(""));
            fatura.add(new Chunk(breakLine));
            fatura.add(new Paragraph(""));
            // Adiocionar a data de criação, o criador e o autor.
            fatura.addCreationDate();
            fatura.addAuthor("© SURFECT 2020");
            fatura.addCreator("SURFECT");
            fatura.add(new Paragraph("Nome do produto: " + faturaNomeProduto));
            fatura.add(new Paragraph("Preço p/ item: " + faturaPrecoProduto + "€"));
            // Adicionar breakline
            fatura.add(new Paragraph(""));
            fatura.add(new Chunk(breakLine));
            fatura.add(new Paragraph(""));
            // Adicionar pagamento
            fatura.add(new Paragraph("Pagamento"));
            fatura.add(new Paragraph("Entidade: 221100"));
            fatura.add(new Paragraph("Referência: " + random));
            fatura.add(new Paragraph("Valor: " + valorTotal + "€"));

            fatura.close();
            Toast.makeText(this, "A fatura para o pagamento do produto foi baixada para o seu telemóvel. " + diretoriaFatura, Toast.LENGTH_SHORT).show();

        } catch (Exception e){
            Toast.makeText(this, e.getMessage(), Toast.LENGTH_SHORT).show();
        }

    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        switch (requestCode){
            case STORAGE_CODE:{
                if(grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED){
                    savePdf();
                }
                else {
                    Toast.makeText(this, "Permissão negada. Por favor, garanta permissão.", Toast.LENGTH_SHORT).show();
                }
            }
        }
    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        String tamanhoSelecionado = parent.getItemAtPosition(position).toString();
        Toast.makeText(parent.getContext(), "Tamanho selecionado: " + tamanhoSelecionado, Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}


