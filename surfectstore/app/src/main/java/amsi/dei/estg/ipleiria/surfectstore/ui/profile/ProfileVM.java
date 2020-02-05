package amsi.dei.estg.ipleiria.surfectstore.ui.profile;

import androidx.lifecycle.LiveData;
import androidx.lifecycle.MutableLiveData;
import androidx.lifecycle.ViewModel;

public class ProfileVM extends ViewModel {

    private MutableLiveData<String> mText;

    public ProfileVM() {
        mText = new MutableLiveData<>();
        mText.setValue("This is gallery fragment");
    }

    public LiveData<String> getText() {
        return mText;
    }
}