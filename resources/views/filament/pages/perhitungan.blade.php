<x-filament::page>
  <div class="grid flex-1 auto-cols-fr gap-y-8">
    <div class="flex flex-col gap-y-6">
      <div ax-load="" ax-load-src="http://spk-ekspedisi.test/js/filament/tables/components/table.js?v=3.2.98.0" x-data="table" class="fi-ta">
        <div class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
          <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10 !border-t-0">
            <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
              <thead class="divide-y divide-gray-200 dark:divide-white/5">
                <tr class="bg-gray-50 dark:bg-white/5">
                  <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name" style=";">
                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                      <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                        Nama Alternative
                      </span>
                    </span>
                  </th>

                  @foreach ($data['criterias'] as $criteria)
                  <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-weight" style=";">
                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                      <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $criteria->name }}
                      </span>
                    </span>
                  </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                @foreach ($data['scores'] as $key => $score)
                <tr class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="9q9yqZmErtbCLW3jusRC.table.records.3">
                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-name" wire:key="9q9yqZmErtbCLW3jusRC.table.record.3.column.name">
                    <div class="fi-ta-col-wrp">
                      <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                          <div class="flex ">
                            <div class="flex max-w-max" style="">
                              <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                  {{ $score->alternative->name }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </button>
                    </div>
                  </td>
                  @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $child)
                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-weight" wire:key="{{$score->id}}">
                    <div class="fi-ta-col-wrp">
                      <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                          <div class="flex ">
                            <div class="flex max-w-max" style="">
                              <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                  {{ $child->attribute->name }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </button>
                    </div>
                  </td>
                  @endforeach

                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                      <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                        <a href="/app/scores/{{$score->id}}/edit" class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action" type="button">
                          <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('edit', '3')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"></path>
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"></path>
                          </svg>

                          <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--primary-400);--c-600:var(--primary-600);" wire:loading.delay.default=""
                            wire:target="mountTableAction('edit', '3')">
                            <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd"
                              fill="currentColor" opacity="0.2"></path>
                            <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                          </svg>
                          <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                            Edit
                          </span>
                        </a>

                        {{--
                        <!--[if BLOCK]><![endif]--> <button class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-danger fi-ac-action fi-ac-link-action" type="button" wire:loading.attr="disabled"
                          wire:click="mountTableAction('delete', '3')">
                          <!--[if BLOCK]><![endif]-->
                          <!--[if BLOCK]><![endif]-->
                          <!--[if BLOCK]><![endif]--> <svg style="--c-400:var(--danger-400);--c-600:var(--danger-600);" wire:loading.remove.delay.default="1" wire:target="mountTableAction('delete', '3')" class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                              d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                              clip-rule="evenodd"></path>
                          </svg>
                          <!--[if ENDBLOCK]><![endif]-->
                          <!--[if ENDBLOCK]><![endif]-->

                          <!--[if BLOCK]><![endif]--> <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" style="--c-400:var(--danger-400);--c-600:var(--danger-600);" wire:loading.delay.default=""
                            wire:target="mountTableAction('delete', '3')">
                            <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd"
                              fill="currentColor" opacity="0.2"></path>
                            <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                          </svg>
                          <!--[if ENDBLOCK]><![endif]-->
                          <!--[if ENDBLOCK]><![endif]-->

                          <span class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline" style="--c-400:var(--danger-400);--c-600:var(--danger-600);">
                            Delete
                          </span>

                          <!--[if BLOCK]><![endif]-->
                          <!--[if ENDBLOCK]><![endif]-->

                          <!--[if BLOCK]><![endif]-->
                          <!--[if ENDBLOCK]><![endif]-->
                        </button> --}}
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- perhitungan 1 --}}
    <div class="flex flex-col gap-y-6">
      <h1>Data Perhitungan</h1>
      <div ax-load="" ax-load-src="http://spk-ekspedisi.test/js/filament/tables/components/table.js?v=3.2.98.0" x-data="table" class="fi-ta">
        <div class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
          <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10 !border-t-0">
            <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
              <thead class="divide-y divide-gray-200 dark:divide-white/5">
                <tr class="bg-gray-50 dark:bg-white/5">
                  <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name" style=";">
                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                      <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                        Nama Alternative
                      </span>
                    </span>
                  </th>

                  @foreach ($data['criterias'] as $criteria)
                  <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-weight" style=";">
                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                      <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $criteria->name }}
                      </span>
                    </span>
                  </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                @foreach ($data['scores'] as $key => $score)
                <tr class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="9q9yqZmErtbCLW3jusRC.table.records.3">
                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-name" wire:key="9q9yqZmErtbCLW3jusRC.table.record.3.column.name">
                    <div class="fi-ta-col-wrp">
                      <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                          <div class="flex ">
                            <div class="flex max-w-max" style="">
                              <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                  {{ $score->alternative->name }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </button>
                    </div>
                  </td>
                  @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $child)
                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-weight" wire:key="{{$score->id}}">
                    <div class="fi-ta-col-wrp">
                      <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                          <div class="flex ">
                            <div class="flex max-w-max" style="">
                              <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                  {{ $child->attribute->score }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </button>
                    </div>
                  </td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- perhitungan 2 --}}

    <div ax-load="" ax-load-src="http://spk-ekspedisi.test/js/filament/tables/components/table.js?v=3.2.98.0" x-data="table" class="fi-ta">
      <h1>Normalisasi</h1>
      <div class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
        <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10 !border-t-0">
          <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
            <thead class="divide-y divide-gray-200 dark:divide-white/5">
              <tr class="bg-gray-50 dark:bg-white/5">
                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name" style=";">
                  <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                    <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                      Nama Alternative
                    </span>
                  </span>
                </th>

                @foreach ($data['criterias'] as $criteria)
                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-weight" style=";">
                  <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                    <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                      {{ $criteria->name }}
                    </span>
                  </span>
                </th>
                @endforeach
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
              @foreach ($data['scores'] as $key => $score)
              <tr class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="9q9yqZmErtbCLW3jusRC.table.records.3">
                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-name" wire:key="9q9yqZmErtbCLW3jusRC.table.record.3.column.name">
                  <div class="fi-ta-col-wrp">
                    <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                      <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                        <div class="flex ">
                          <div class="flex max-w-max" style="">
                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                              <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                {{ $score->alternative->name }}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>

                    </button>
                  </div>
                </td>
                @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $child)
                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-weight" wire:key="{{$score->id}}">
                  <div class="fi-ta-col-wrp">
                    <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                      <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                        <div class="flex ">
                          <div class="flex max-w-max" style="">
                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                              <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                {{ $data['perhitungan']['normalizedMatrix'][$score->id][$child->attribute_id]['value'] }}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </button>
                  </div>
                </td>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- perhitungan 3 --}}
    <div class="flex flex-col gap-y-6">
      <h1>Hasil Perhitungan</h1>
      <div ax-load="" ax-load-src="http://spk-ekspedisi.test/js/filament/tables/components/table.js?v=3.2.98.0" x-data="table" class="fi-ta">
        <div class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
          <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10 !border-t-0">
            <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
              <thead class="divide-y divide-gray-200 dark:divide-white/5">
                <tr class="bg-gray-50 dark:bg-white/5">
                  <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-name" style=";">
                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                      <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                        Nama Alternative
                      </span>
                    </span>
                  </th>

                  @foreach ($data['criterias'] as $criteria)
                  <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-weight" style=";">
                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                      <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $criteria->name }}
                      </span>
                    </span>
                  </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                @foreach ($data['scores'] as $key => $score)
                <tr class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5" wire:key="9q9yqZmErtbCLW3jusRC.table.records.3">
                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-name" wire:key="9q9yqZmErtbCLW3jusRC.table.record.3.column.name">
                    <div class="fi-ta-col-wrp">
                      <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                          <div class="flex ">
                            <div class="flex max-w-max" style="">
                              <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                  {{ $score->alternative->name }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </button>
                    </div>
                  </td>
                  @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $key => $child)
                  <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-weight" wire:key="{{$score->id}}">
                    <div class="fi-ta-col-wrp">
                      <button type="button" wire:click="mountTableAction('edit', '3')" wire:loading.attr="disabled" wire:target="mountTableAction('edit', '3')" class="flex w-full disabled:pointer-events-none justify-start text-start">
                        <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                          <div class="flex ">
                            <div class="flex max-w-max" style="">
                              <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  " style="">
                                  {{ $data['perhitungan']['scores_maatrics'][$score->id][$key]['value'] }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </button>
                    </div>
                  </td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- perhitungan 4 --}}
  </div>
</x-filament::page>