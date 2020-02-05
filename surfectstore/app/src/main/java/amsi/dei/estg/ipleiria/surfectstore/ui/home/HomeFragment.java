package amsi.dei.estg.ipleiria.surfectstore.ui.home;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import amsi.dei.estg.ipleiria.surfectstore.R;
import amsi.dei.estg.ipleiria.surfectstore.ui.address.AddressFragment;
import amsi.dei.estg.ipleiria.surfectstore.ui.profile.ProfileFragment;
import amsi.dei.estg.ipleiria.surfectstore.ui.shop.ShopFragment;

public class HomeFragment extends Fragment {

    private ImageView imgSurf, imgLoja, imgPraias;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_home, container, false);

        imgSurf = (ImageView)v.findViewById(R.id.home_imgSurf);
        imgLoja = (ImageView)v.findViewById(R.id.home_imgLoja);
        imgPraias = (ImageView)v.findViewById(R.id.home_imgEnvio);

        imgSurf.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                swapProfileFragment();
            }
        });

        imgLoja.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) { swapShopFragment();
            }
        });

        imgPraias.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                swapAddressFragment();
            }
        });

        return v;
    }

    public void swapProfileFragment(){
        ProfileFragment profileFragment = new ProfileFragment();
        FragmentTransaction transaction = getFragmentManager().beginTransaction();
        transaction.replace(R.id.nav_host_fragment, profileFragment);
        transaction.addToBackStack(null);
        transaction.commit();
    }

    public void swapShopFragment(){
        ShopFragment shopFragment = new ShopFragment();
        FragmentTransaction transaction = getFragmentManager().beginTransaction();
        transaction.replace(R.id.nav_host_fragment, shopFragment);
        transaction.addToBackStack(null);
        transaction.commit();
    }

    public void swapAddressFragment(){
        AddressFragment addressFragment = new AddressFragment();
        FragmentTransaction transaction = getFragmentManager().beginTransaction();
        transaction.replace(R.id.nav_host_fragment, addressFragment);
        transaction.addToBackStack(null);
        transaction.commit();
    }
}