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
                                <button type="button"
                                    class="btn btn btn-light region-button {{ $branch->name === request()->branch ? 'active' : '' }}"
                                    data-region="{{ $branch->name }}" onclick="fetchDataByBranch(event)">
                                    {{ $branch->name }}
                                </button>
                            @endforeach
                        </div>
                        <input type="hidden" name="selected_regions" id="selected_regions">
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

    function fetchDataByBranch(event) {
        const branchName = event.target.dataset.region;
        const startDate = document.querySelector("input[name=date_start]");
        const endDate = document.querySelector("input[name=date_end]");
        console.log(startDate.value);

        const currentPage = window.location.pathname;
        let redirectUrl;

        if (currentPage.includes('/polytrauma')) {
            // If current page is in the "polytrauma" section
            redirectUrl = `/polytrauma/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;
        } else if (currentPage.includes('/acs')) {
            // If current page is in the "acs" section
            redirectUrl = `/acs/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;
        } else {
            // Default redirection, e.g., if not in polytrauma or acs section
            redirectUrl = `/acs/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;
        }

        window.location.href = redirectUrl;
    }
       
</script>
