package amsi.dei.estg.ipleiria.surfectstore.adapters;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;

import java.util.List;

import amsi.dei.estg.ipleiria.surfectstore.R;
import amsi.dei.estg.ipleiria.surfectstore.activities.ProductDetails;
import amsi.dei.estg.ipleiria.surfectstore.models.Produto;

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.MyViewHolder> {

    private Context context;
    private List<Produto> listaProdutos;
    RequestOptions option;

    public RecyclerViewAdapter(Context context, List<Produto> listaProdutos) {
        this.context = context;
        this.listaProdutos = listaProdutos;

        option = new RequestOptions().centerCrop().placeholder(R.drawable.loading_shape).error(R.drawable.loading_shape);
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        View v;
        LayoutInflater inflater = LayoutInflater.from(context);
        v = inflater.inflate(R.layout.products_row_item, parent, false);
        final MyViewHolder vHolder = new MyViewHolder(v);
        vHolder.containerProduto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, ProductDetails.class);
                intent.putExtra("nomeProduto", listaProdutos.get(vHolder.getAdapterPosition()).getNomeProduto());
                intent.putExtra("precoProduto", listaProdutos.get(vHolder.getAdapterPosition()).getPrecoProduto());
                intent.putExtra("stockProduto", listaProdutos.get(vHolder.getAdapterPosition()).getStockProduto());
                intent.putExtra("descricaoProduto", listaProdutos.get(vHolder.getAdapterPosition()).getDescricaoProduto());
                intent.putExtra("categoriaProduto", listaProdutos.get(vHolder.getAdapterPosition()).getCategoriaProduto());
                intent.putExtra("fotoProduto", listaProdutos.get(vHolder.getAdapterPosition()).getFotoProduto());

                context.startActivity(intent);
            }
        });

        return vHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder holder, int position) {

        holder.nomeProduto.setText(listaProdutos.get(position).getNomeProduto());
        holder.categoriaProduto.setText("Categoria: " + listaProdutos.get(position).getCategoriaProduto());
        holder.precoProduto.setText(String.valueOf(listaProdutos.get(position).getPrecoProduto()));
        holder.stockProduto.setText("Em stock: " + listaProdutos.get(position).getStockProduto());
        // Usar o glide para ir buscar a imagem
        Glide.with(context).load(listaProdutos.get(position).getFotoProduto()).apply(option).into(holder.imgProduto);

    }

    @Override
    public int getItemCount() {
        return listaProdutos.size();
    }

    public static class MyViewHolder extends RecyclerView.ViewHolder {

        private TextView nomeProduto, categoriaProduto, precoProduto, stockProduto;
        private ImageView imgProduto;
        private LinearLayout containerProduto;

        public MyViewHolder(View itemView){
            super(itemView);

            containerProduto = (LinearLayout)itemView.findViewById(R.id.shop_recLinProduto);
            nomeProduto = (TextView)itemView.findViewById(R.id.shop_tvNomeProduto);
            categoriaProduto = (TextView)itemView.findViewById(R.id.shop_tvCategoria);
            precoProduto = (TextView)itemView.findViewById(R.id.shop_tvPreço);
            stockProduto = (TextView)itemView.findViewById(R.id.shop_tvStock);
            imgProduto = (ImageView)itemView.findViewById(R.id.shop_imgProduto);
        }
    }
}
