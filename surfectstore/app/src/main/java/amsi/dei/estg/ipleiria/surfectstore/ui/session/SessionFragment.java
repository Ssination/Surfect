package amsi.dei.estg.ipleiria.surfectstore.ui.session;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import amsi.dei.estg.ipleiria.surfectstore.Dialog;
import amsi.dei.estg.ipleiria.surfectstore.R;

public class SessionFragment extends Fragment {

    Button terminarSessao;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {

        View v = inflater.inflate(R.layout.fragment_session, container, false);

        inicializeComponents(v);

        terminarSessao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openDialog();
            }
        });

        return v;
    }

    public void openDialog() {
        Dialog dialog = new Dialog();
        dialog.show(getFragmentManager(), "dialog");
    }

    public void inicializeComponents(View v){

        // Achar os objetos no xml
        // Button
        terminarSessao = (Button)v.findViewById(R.id.ses_btTerminar);
    }
}