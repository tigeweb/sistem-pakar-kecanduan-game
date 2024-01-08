@if ($groupedPermissions)
    <div class="row mb-3">
        <h5 style="margin-bottom: -7px">Izin Akses</h5>

        <input type="hidden" id="permissions">
        <x-errors.input-error name="permissions" />
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <x-forms.check-group id="permission_all" label="Pilih Semua Izin Akses" error="false" />
        </div>
    </div>

    @foreach ($groupedPermissions as $group)
        @php
            $label = str_replace('_', ' ', $group['name']);
        @endphp

        <hr>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <x-forms.check-group id="permission_all_{{ $group['name'] }}" label="{{ $label }}"
                        error="false" />
                </div>
            </div>
            <div class="row">
                @foreach ($group['permissions'] as $permission)
                    @php
                        $labelPermission = str_replace('_', ' ', $permission);
                    @endphp
                    <div class="col-md-4">
                        <x-forms.check-group name="permissions[]" data-group="group_{{ $group['name'] }}"
                            id="permission_id_{{ $permission }}" label="{{ $labelPermission }}" error="false"
                            value="{{ $permission }}"
                            checked="{{ $role->hasPermissionTo($permission) ? 'true' : 'false' }}" />
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    @if ($groupedPermissionsDashboard)
        @php
            $label = str_replace('_', ' ', $groupedPermissionsDashboard['name']);
        @endphp

        <hr>
        <div class="row mb-3">
            @foreach ($groupedPermissionsDashboard['permissions'] as $permission)
                @php
                    $labelPermission = str_replace('_', ' ', $permission);
                    $isChecked = $role->hasPermissionTo($permission);
                    if ($permission == \App\Permissions\Permission::VIEW_WITH_FILTER_GUDANG_DASHBOARD && !$isChecked) {
                        $isChecked = true;
                    }
                @endphp
                <div class="col-sm-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="permissions[]"
                            id="permission_id_{{ $permission }}" value="{{ $permission }}"
                            {{ $isChecked ? 'checked' : '' }}>
                        <x-labels.input-label for="permission_id_{{ $permission }}" className="form-check-label"
                            value="{{ $labelPermission }}" />
                    </div>
                </div>
            @endforeach
        </div>
    @endif



    <script>
        $(document).ready(function() {
            // Fungsi untuk memeriksa dan mengatur status permission_all
            function checkAndSetPermissionAll() {
                var allCheckboxes = $("input[type=checkbox]").not("#permission_all");
                var allChecked = allCheckboxes.length === allCheckboxes.filter(":checked").length;
                $("#permission_all").prop("checked", allChecked);
            }

            // Fungsi untuk memeriksa dan mengatur status permission_all_groupname
            function checkAndSetPermissionAllGroup(groupName) {
                var groupCheckboxes = $("input[data-group='group_" + groupName + "']");
                var allChecked = groupCheckboxes.length === groupCheckboxes.filter(":checked").length;
                $("#permission_all_" + groupName).prop("checked", allChecked);
            }

            $("#permission_all").on("click", function() {
                // Mengecek apakah permission_all dicentang atau tidak
                var isChecked = $(this).prop("checked");

                // Mengubah status semua checkbox permission sesuai dengan status permission_all
                $("input[type=checkbox]").prop("checked", isChecked);
            });

            // Ketika halaman dimuat, panggil fungsi checkAndSetPermissionAll
            checkAndSetPermissionAll();

            // Ketika halaman dimuat, panggil fungsi checkAndSetPermissionAllGroup untuk setiap group permission
            $("[id^='permission_all_']").each(function() {
                var groupName = this.id.replace("permission_all_", "");
                checkAndSetPermissionAllGroup(groupName);
                checkAndSetPermissionAll();
            });

            // Fungsi untuk menangani perubahan pada checkbox permission_all_groupname
            $("[id^='permission_all_']").on("change", function() {
                var groupName = this.id.replace("permission_all_", "");
                var isChecked = $(this).prop("checked");
                $("input[data-group='group_" + groupName + "']").prop("checked", isChecked);
                checkAndSetPermissionAll();
            });

            // Ketika salah satu dari checkbox permission diubah
            $("input[type=checkbox]").on("change", function() {
                var anyCheckboxUnchecked = $("input[type=checkbox]").not("#permission_all").not(":checked")
                    .length > 0;
                $("#permission_all").prop("checked", !anyCheckboxUnchecked);

                // Memeriksa dan mengatur status permission_all_groupname jika checkbox ini termasuk dalam grup
                if (this.hasAttribute("data-group")) {
                    var groupName = $(this).data("group").replace("group_", "");
                    checkAndSetPermissionAllGroup(groupName);
                    checkAndSetPermissionAll();
                }
            });
        });
    </script>
@endif
