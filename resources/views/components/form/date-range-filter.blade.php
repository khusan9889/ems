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
                            {{-- <button type="button" class="btn btn btn-light region-button"
                                data-region="РНЦЭМП">РНЦЭМП</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Андижанский">Андижанский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Наманганский">Наманганский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Ферганский">Ферганский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Ташкентский">Ташкентский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Сырдарьинский">Сырдарьинский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Джизакский">Джизакский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Самаркандский">Самаркандский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Кашкадарьинский">Кашкадарьинский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Сурхандарьинский">Сурхандарьинский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Навоийский">Навоийский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Бухарский">Бухарский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Хорезмский">Хорезмский</button>
                            <button type="button" class="btn btn btn-light region-button"
                                data-region="Каракалпакстанский">Каракалпакстанский</button> --}}
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
    // document.addEventListener("DOMContentLoaded", function() {
    //     const branchButtons = document.querySelectorAll(".region-button");
    //     const startDate = document.querySelector("input[name=date_start]");

    //     console.log({startDate});

    //     branchButtons.forEach(button => {
    //         button.addEventListener("click", function() {
    //             const selectedBranch = this.getAttribute("data-region");
    //             window.location.href = `/acs/statistics?branch=${selectedBranch}`;
    //         });
    //     });
    // });

    function fetchDataByBranch(event) {
        const branchName = event.target.dataset.region;
        const startDate = document.querySelector("input[name=date_start]");
        const endDate = document.querySelector("input[name=date_end]");
        console.log(startDate.value);

        window.location.href =
            `/acs/statistics?branch=${branchName}&date_start=${startDate.value}&date_end=${endDate.value}`;

    }
</script>
