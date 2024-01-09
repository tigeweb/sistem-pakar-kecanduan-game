@props(['data_role' => null, 'data_permissions' => null, 'disabled' => false])

@php
    if ($data_role || $data_permissions) {
        $role = $data_role->id;
        $permissions = $data_permissions->name;
    } else {
        $role = '';
        $permissions = '';
    }
@endphp

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <x-forms.select-group label="role" id="role" name="role" placeholder="Pilih Role" :optionSelects="get_select_data_custom_column(get_data_role_without_superadmin(), 'name')"
            value="{{ $role }}" />
    </div>
    <div class="col-md-4">
        <x-forms.select-group label="akses menu" id="akses_menu" name="akses_menu" placeholder="Pilih Akses Menu"
            :optionSelects="get_select_custom(get_data_permissions(), 'name', 'name')" value="{{ $permissions }}" />
    </div>
    <div class="col-md-2"></div>
</div>

<div id="izin-akses">

</div>
