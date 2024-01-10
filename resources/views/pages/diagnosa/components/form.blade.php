<form id="formActionPost" hx-post="{{ route('diagnosa.store') }}" hx-target="#formActionPost" hx-swap="outerHTML"
    hx-disabled-elt="#submitBtn">
    @csrf
    <div class="row">
        <div class="input-field col s12">
            <h4>Diagnosa Kecanduan Game Genshin Impact Terhadap Perilaku Remaja</h4>
        </div>
    </div>
    <div id="form_input">
        @include('pages.diagnosa.components.gejala')
    </div>
    <div class="row">
        <div class="input-field col m6 s12">
            <button type="submit" id="submitBtn" class="waves-effect waves-light btn-large">
                <i class="material-icons right">backup</i>
                Submit
            </button>
        </div>
    </div>
</form>
