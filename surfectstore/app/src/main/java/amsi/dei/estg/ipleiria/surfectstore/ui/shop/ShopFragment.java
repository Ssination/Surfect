package amsi.dei.estg.ipleiria.surfectstore.ui.shop;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.viewpager.widget.ViewPager;

import com.google.android.material.tabs.TabLayout;

import amsi.dei.estg.ipleiria.surfectstore.R;
import amsi.dei.estg.ipleiria.surfectstore.adapters.CategoriesViewPagerAdapter;
import amsi.dei.estg.ipleiria.surfectstore.fragments.FragmentAcessories;
import amsi.dei.estg.ipleiria.surfectstore.fragments.FragmentClothing;
import amsi.dei.estg.ipleiria.surfectstore.fragments.FragmentSurf;

public class ShopFragment extends Fragment {

    private TabLayout tabLayout;
    private ViewPager viewPager;
    private CategoriesViewPagerAdapter viewPagerAdapter;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_shop, container, false);

        tabLayout = (TabLayout)v.findViewById(R.id.shop_tabLayout);
        viewPager = (ViewPager)v.findViewById(R.id.shop_viewPager);

        viewPagerAdapter = new CategoriesViewPagerAdapter(getFragmentManager());

        viewPagerAdapter.addFragment(new FragmentSurf(),"1. Surf");
        viewPagerAdapter.addFragment(new FragmentClothing(),"2. Roupa");
        viewPagerAdapter.addFragment(new FragmentAcessories(),"3. Acessórios");

        viewPager.setAdapter(viewPagerAdapter);
        tabLayout.setupWithViewPager(viewPager);

        return v;
    }
}