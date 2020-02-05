package amsi.dei.estg.ipleiria.surfectstore.adapters;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentPagerAdapter;

import java.util.ArrayList;
import java.util.List;

public class CategoriesViewPagerAdapter extends FragmentPagerAdapter
{

    private List<Fragment> listaFragmentos = new ArrayList<>();
    private List<String> listaTitulos = new ArrayList<>();

    public CategoriesViewPagerAdapter(FragmentManager fm) {
        super(fm);
    }

    @NonNull
    @Override
    public Fragment getItem(int position) {
        return listaFragmentos.get(position);
    }

    @Override
    public int getCount() {
        return listaTitulos.size();
    }

    @Nullable
    @Override
    public CharSequence getPageTitle(int position) {
        return listaTitulos.get(position);
    }

    public void addFragment(Fragment fragmento, String titulo){
        listaFragmentos.add(fragmento);
        listaTitulos.add(titulo);

    }
}
