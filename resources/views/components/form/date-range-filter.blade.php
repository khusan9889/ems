<x-panel title="Фильтр">
    <form>
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <x-form.input type="date" name="date_start"
                                      :value="request('date_start')??date('Y-m-d', strtotime('-30 days'))"
                                      placeholder="От"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.input type="date" name="date_end"
                                      :value="request('date_end')??date('Y-m-d')" placeholder="До"/>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary float-right btn-block">Ок</button>
            </div>
        </div>
    </form>
</x-panel>
