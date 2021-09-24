<x-app-layout>
    @section('title')
    Mahasiswa
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahasiswa') }}
        </h2>
    </x-slot>

    
  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div x-data="{ showModal : false }">
        <button @click="showModal = !showModal" class="btn btn-gradient-blue p-2 mb-5">Tambah</button>
        <!-- Modal Background -->
        <div x-show="showModal"
          class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
          x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
          <!-- Modal -->
          <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 lg:w-6/12 mx-10"
            @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease duration-100 transform"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-90 translate-y-1">
            <div>
              <!-- Title -->
              <span class="font-bold block text-2xl mb-3">Tambah Mahasiswa</span>
            </div>

            <div class="overflow-y-auto" style="max-height: 80vh;">
              <form action="{{ route('mahasiswa.store') }}" id="formTambahMahasiswa" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form md:flex flex-wrap">

                  <div class="md:flex flex-row md:space-x-4 w-1/2 text-xs">
                    <div class="mb-3 space-y-2 w-full text-xs flex flex-wrap items-center">
                      <div class="w-full px-4">
                        <label class="font-semibold text-gray-600 py-2 text-lg" for="nim_mahasiswa_id">NIM Mahasiswa<span
                            class="text-red-500">*</span></label>
                        <input placeholder="10001" class="input mt-2" required="required" type="text"
                          name="nim_mahasiswa" id="nim_mahasiswa_id">
                      </div>
                    </div>
                  </div>

                  <div class="md:flex flex-row md:space-x-4 w-1/2 text-xs">
                    <div class="mb-3 space-y-2 w-full text-xs flex flex-wrap items-center">
                      <div class="w-full px-4">
                        <label class="font-semibold text-gray-600 py-2 text-lg" for="nama_mahasiswa_id">Nama Mahasiswa<span
                            class="text-red-500">*</span></label>
                        <input placeholder="Hosea Dike" class="input mt-2" required="required" type="text"
                          name="nama_mahasiswa" id="nama_mahasiswa_id">
                      </div>
                    </div>
                  </div>
                  <p class="text-xs text-red-500 w-full text-right my-3">Required fields are marked with an asterisk
                    <span>*</span>
                  </p>

                </div>
              </form>

            </div>

            <!-- Buttons -->
            <div class="text-right space-x-5 mt-5">
              <button @click="showModal = !showModal"
                class="px-4 py-2 text-sm bg-gray-200 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-300 focus:bg-indigo-50 focus:text-indigo">Cancel</button>
              <button type="submit"
                class="px-4 py-2 text-sm bg-green-400 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-white focus:outline-none focus:ring-0 font-bold hover:bg-green-500 focus:bg-green-500 focus:text-indigo"
                form="formTambahMahasiswa">Simpan</button>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 overflow-auto max-h-screen">
          <table class="w-full">
            <thead>
              <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-indigo-200 uppercase border-b border-gray-600">
                <th class="px-4 py-3 w-40 text-center" style="min-width: 11rem;">NIM</th>
                <th class="px-4 py-3 text-center" style="min-width: 15rem;">Nama</th>
                <th class="px-4 py-3 w-40 text-center">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              @forelse ($mahasiswa as $mahasiswaItem)
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center justify-center text-sm">
                      <p class="font-semibold text-black">{{ $mahasiswaItem->nim }}</p>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <div class="flex items-center text-sm">
                      <p class="font-semibold text-black">{{ $mahasiswaItem->nama }}</p>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm border">
                    <div class="flex item-center justify-center">
                      {{-- <a href="#" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            </a> --}}
                      <div x-data="{ showModal : false }">

                        <button @click="showModal = !showModal" class="w-4 mr-2 transform scale-110 text-yellow-500 hover:text-yellow-600 hover:scale-125">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        </button>
                        <!-- Modal Background -->
                        <div x-show="showModal"
                          class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                          x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                          x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                          <!-- Modal -->
                          <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 lg:w-6/12 mx-10"
                            @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease duration-100 transform"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                            <div>
                              <!-- Title -->
                              <span class="font-bold block text-2xl mb-3">Edit Mahasiswa</span>
                            </div>

                            <div class="overflow-y-auto" style="max-height: 80vh;">
                              <form action="{{ route('mahasiswa.update', ['mahasiswa' => $mahasiswaItem->id]) }}" id="formEditMahasiswa" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form md:flex flex-wrap">

                                  <div class="md:flex flex-row md:space-x-4 w-1/2 text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs flex flex-wrap items-center">
                                      <div class="w-full px-4">
                                        <label class="font-semibold text-gray-600 py-2 text-lg"
                                          for="nim_mahasiswa_id">NIM Mahasiswa <span
                                            class="text-red-500">*</span></label>
                                        <input placeholder="100001" class="input mt-2" required="required"
                                          type="text" name="nim_mahasiswa" id="nim_mahasiswa_id" value="{{ $mahasiswaItem->nim }}">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="md:flex flex-row md:space-x-4 w-1/2 text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs flex flex-wrap items-center">
                                      <div class="w-full px-4">
                                        <label class="font-semibold text-gray-600 py-2 text-lg"
                                          for="nama_mahasiswa_id">Nama Mahasiswa <span
                                            class="text-red-500">*</span></label>
                                        <input placeholder="Hosea Dike" class="input mt-2" required="required"
                                          type="text" name="nama_mahasiswa" id="nama_mahasiswa_id" value="{{ $mahasiswaItem->nama }}">
                                      </div>
                                    </div>
                                  </div>
                                  <p class="text-xs text-red-500 w-full text-right my-3">Required fields are marked with an asterisk
                                    <span>*</span>
                                  </p>

                                </div>
                              </form>

                            </div>

                            <!-- Buttons -->
                            <div class="text-right space-x-5 mt-5">
                              <button @click="showModal = !showModal"
                                class="px-4 py-2 text-sm bg-gray-200 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-300 focus:bg-indigo-50 focus:text-indigo">Cancel</button>
                              <button type="submit"
                                class="px-4 py-2 text-sm bg-yellow-400 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-white focus:outline-none focus:ring-0 font-bold hover:bg-yellow-500 focus:bg-yellow-500 focus:text-indigo"
                                form="formEditMahasiswa">Update</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div x-data="{ showModal : false }">
                        <button @click="showModal = !showModal"
                          class="w-4 mr-2 transform scale-110 text-red-500 hover:text-red-600 hover:scale-125">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                        </button>

                        <div x-show="showModal"
                          class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                          x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                          x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                          <!-- Modal -->
                          <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 lg:w-6/12 mx-10"
                            @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease duration-100 transform"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                            <div>
                              <!-- Title -->
                              <span class="font-bold block text-2xl mb-3">Hapus Mahasiswa</span>
                            </div>

                            <div class="overflow-y-auto" style="max-height: 80vh;">
                              <form action="{{ route('mahasiswa.destroy', ['mahasiswa' => $mahasiswaItem->id]) }}"
                                id="formHapusServis" method="POST" enctype="multipart/form-data">
                                @method('DELETE')
                                @csrf
                                <h1 class="text-xl">Apakah anda yakin ingin menghapus Mahasiswa, dengan nama "<b>{{ $mahasiswaItem->nama }}</b>" ?</h1>
                              </form>

                            </div>

                            <!-- Buttons -->
                            <div class="text-right space-x-5 mt-5">
                              <button @click="showModal = !showModal"
                                class="px-4 py-2 text-sm bg-gray-200 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-300 focus:bg-indigo-50 focus:text-indigo">Cancel</button>
                              <button type="submit"
                                class="px-4 py-2 text-sm bg-red-400 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-white focus:outline-none focus:ring-0 font-bold hover:bg-red-500 focus:bg-red-500 focus:text-indigo"
                                form="formHapusServis">Hapus</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td class="px-4 border" colspan="4">
                    <div class="py-5">
                      <h1 class="text-center text-lg">Belum ada mahasiswa, silahkan tambahkan seorang mahasiswa.</h1>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="mt-5">
          {{ $mahasiswa->links() }}
      </div>
    </div>
  </div>
</x-app-layout>