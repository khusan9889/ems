<x-panel title="Фильтры">
    <form>
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <x-form.input type="date" name="date_start" :value="request('date_start') ?? date('Y-m-d', strtotime('-30 days'))" placeholder="От" />
                    </div>
                    <div class="col-md-6">
                        <x-form.input type="date" name="date_end" :value="request('date_end') ?? date('Y-m-d')" placeholder="До" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Выберите субъект: </label>
                        <div class="d-flex flex-wrap" style="gap:1rem;">
                            @foreach ($branches as $branch)
                                @php
                                    $isActive =  request()->branch ? request()->branch == $branch['name'] : auth()->user()->branch_id == $branch['id'];
                                    $isVisible =  auth()->user()->branch_id == 1 || auth()->user()->branch_id == $branch['id'];
                                @endphp

                                <button type="button"
                                    class="btn btn btn-light region-button {{ $isActive ? 'active' : '' }} {{ $isVisible ? 'visible' : 'hidden' }}"
                                    data-region="{{ $branch['name'] }}"
                                    onclick="fetchDataByBranch('{{ $branch['name'] }}')">
                                    {{ $branch['name'] }}
                                </button>
                            @endforeach
                        </div>
                        {{-- <input type="hidden" name="selected_regions" id="selected_regions" value="{{ auth()->user()->branch_id }}"> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary float-right btn-block">Ок</button>
            </div>
        </div>
    </form>
</x-panel>

<script>
    // Function to update statistics based on the selected branch
    function fetchDataByBranch(branchName) {
        const startDate = document.querySelector("input[name=date_start]");
        const endDate = document.querySelector("input[name=date_end]");

        const currentPage = window.location.pathname;
        let redirectUrl;

        if (currentPage.includes('/polytrauma')) {
            redirectUrl =
                `/polytrauma/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;
        } else if (currentPage.includes('/acs')) {
            redirectUrl =
            `/acs/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;
        } else {
            redirectUrl =
                `/default/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;
        }

        window.location.href = redirectUrl;
    }

    // Automatically choose the authenticated user's branch and update statistics
    document.addEventListener("DOMContentLoaded", function() {
        const userBranchId = '{{ auth()->user()->branch_id }}';
        const selectedBranch = document.querySelector(`.region-button[data-region='${userBranchId}']`);

        if (selectedBranch) {
            selectedBranch.click();
        }
    });
</script>

<style>
    .hidden {
        display: none;
    }

    .visible {
        display: block;
    }
</style>
