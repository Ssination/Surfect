package amsi.dei.estg.ipleiria.surfectstore.fragments;

import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import amsi.dei.estg.ipleiria.surfectstore.Endpoints;
import amsi.dei.estg.ipleiria.surfectstore.R;
import amsi.dei.estg.ipleiria.surfectstore.adapters.RecyclerViewAdapter;
import amsi.dei.estg.ipleiria.surfectstore.models.Produto;

public class FragmentAcessories extends Fragment {

    private View v;
    // private final String JSON_URL = "http://192.168.1.40/api/web/products/acessorios";
    private static JsonArrayRequest request;
    private RequestQueue requestQueue;
    private RecyclerView recyclerViewProdutos;
    private ArrayList<Produto> listaProdutos;


    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {

        v = inflater.inflate(R.layout.surf_fragment, container, false);
        listaProdutos = new ArrayList<>();

        listaProdutos = new ArrayList<>();
        recyclerViewProdutos = (RecyclerView)v.findViewById(R.id.shop_recSurfProdutos);
        jsonRequest();

        return v;
    }

    public void jsonRequest(){

        String epURL_ACESSORIOS = Endpoints.URL_ACESSORIOS;

        request = new JsonArrayRequest(Request.Method.GET, epURL_ACESSORIOS, null,  new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {

                JSONObject jsonObject = null;

                for(int i = 0; i < response.length(); i++){

                    try {
                        jsonObject = response.getJSONObject(i);

                        Produto produto = new Produto();
                        produto.setNomeProduto(jsonObject.getString("name"));
                        produto.setPrecoProduto(jsonObject.getInt("price"));
                        produto.setStockProduto(jsonObject.getInt("stock"));
                        produto.setDescricaoProduto(jsonObject.getString("description"));
                        produto.setDescontoProduto(jsonObject.getInt("discount"));
                        produto.setCategoriaProduto(jsonObject.getInt("category_id"));
                        produto.setFotoProduto(Endpoints.URL_IMAGEM + jsonObject.getString("photo"));
                        listaProdutos.add(produto);
                    }
                    catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
                setUpRecyclerView(listaProdutos);
            }
        }, new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){
                Toast.makeText(getActivity(), "Erro! " + error.toString(), Toast.LENGTH_SHORT).show();
            }
        });
        requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
        requestQueue.add(request);
    }

    private void setUpRecyclerView(List<Produto> listaProdutos){
        RecyclerViewAdapter myAdapter = new RecyclerViewAdapter(getActivity(), listaProdutos);
        recyclerViewProdutos.setLayoutManager(new LinearLayoutManager(getActivity()));
        recyclerViewProdutos.setAdapter(myAdapter);
    }
}
