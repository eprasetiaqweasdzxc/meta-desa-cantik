<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref, defineProps, computed } from 'vue';

// Use `ref` for reactive data
const kabupaten = ref(null);
const kecamatan = ref(null);
const kecamatans = ref([]);
const desa = ref(null);
const desas = ref([]);
const blok = ref(null);
const bloks = ref([]);

// Use `defineProps` for props instead of `defineProps({ ... })`
defineProps({
    kabupatens: Object,
    data: Object,
    region: Object
})

const destroy = (id) => {
    if (confirm('Apakah anda yakin menghapus entrian ini?')) {
        router.delete(route('form.destroy', { region_id: blok.value, id }), {
            preserveState: true,
            preserveScroll: true,
            only: ['data', 'region']
        })
    }
}

const loadKecamatans = async () => {
    try {
        const response = await axios.get(`/kecamatan/` + kabupaten.value);

        kecamatans.value = response.data.kecamatan;

    } catch (error) {
        console.error('Error fetching kecamatan:', error);
    }
};

const loadDesas = async () => {
    try {
        desa.value = null;
        blok.value = null;
        const response = await axios.get(`/desa/` + kabupaten.value + `/` + kecamatan.value);

        desas.value = response.data.desa;

    } catch (error) {
        console.error('Error fetching desa:', error);
    }
};

const loadBloks = async () => {
    try {
        blok.value = null;
        const response = await axios.get(`/blok/` + kabupaten.value + `/` + kecamatan.value + `/` + desa.value);

        bloks.value = response.data.blok;
    } catch (error) {
        console.error('Error fetching blok sensus:', error);
    }
};

function submit() {
    router.visit("/form/" + blok.value, {
        preserveState: true,
        preserveScroll: true,
        only: ['data', 'region']
    })
}

function entri() {
    router.visit("/form/create/" + blok.value, {
        preserveState: false,
        preserveScroll: false,
    })
}

function edit(id) {
    const par = route().params
    router.visit(route('form.edit', { region_id: par['region_id'], id }), {
        preserveState: false,
        preserveScroll: false,
    })
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-2">
                    <form @submit.prevent="submit">
                        <div class="form-group flex-col grid grid-cols-1 pb-2 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3 px-3 order-1 sm:order-1">
                                <label for="kabupaten"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KABUPATEN</label>
                                <select v-model="kabupaten" name="kabupaten" @change="loadKecamatans"
                                    class="form-control sm:col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full   focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="kabupatens">
                                    <option v-for="kabupaten in kabupatens" :value="kabupaten.id" :key="kabupaten.id">{{
                        kabupaten.nama }}</option>
                                </select>
                            </div>
                            <div class="sm:col-span-3 px-3 order-2 sm:order-3">
                                <label for="kecamatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KECAMATAN</label>
                                <select v-model="kecamatan" name="kecamatan" :disabled="!kabupaten" @change="loadDesas"
                                    class="form-control sm:col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="kecamatans">
                                    <option v-for="kecamatan in kecamatans" :value="kecamatan.id" :key="kecamatan.id">{{
                        kecamatan.nama }}</option>
                                </select>
                            </div>
                            <div class="sm:col-span-3 px-3 order-3 sm:order-2">
                                <label for="desa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESA</label>
                                <select v-model="desa" name="desa" :disabled="!kecamatan" @change="loadBloks"
                                    class="form-control sm:col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full  focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="desas">
                                    <option v-for="desa in desas" :value="desa.id" :key="desa.id">{{ desa.nama }}
                                    </option>
                                </select>
                            </div>
                            <div class="sm:col-span-3 px-3 order-4 sm:order-4">
                                <label for="bloks"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NBS /
                                    NKS</label>
                                <select v-model="blok" name="blok" :disabled="!desa"
                                    class="form-control sm:col-span-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="bloks">
                                    <option v-for="blok in bloks" :value="blok.id" :key="blok.id">{{ blok.nama }}
                                    </option>
                                </select>
                            </div>
                            <div class="sm:col-span-3 px-3 order-5 sm:order-5">
                                <button type="submit" :disabled="!blok"
                                    class="disabled:bg-gray-200 min-w-15 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">Cari</button>
                                <button type="button" @click="entri" :disabled="!blok"
                                    class="disabled:bg-gray-200 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Entri</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="relative mt-3 overflow-x-auto ">
                    <div v-if="region != null">
                        <p>WILAYAH: [{{ region.provinsi }}{{ region.kabupaten }}{{ region.kecamatan }}{{ region.desa
                            }}{{
                        region.nbs }}{{ region.nks }}] </p>
                    </div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No. Urut Ruta
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Anggota Rumah Tangga 15 Tahun Ke Atas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status Dokumen
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status Submit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Terakhir diupdate
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Edit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hapus
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="data == ''">
                                <td colspan="5" scope="row"
                                    class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Data tidak tersedia
                                </td>
                            </tr>
                            <tr v-else v-for="datum in data" :key="datum.nurt"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ datum.nurt }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ datum.jumlah_art }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ datum.docState }}
                                </td>
                                <td class="px-6 py-4">
                                    <div v-if="datum.docState == '1'">
                                        Submitted
                                    </div>
                                    <div v-else>
                                        Open
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ datum.updated_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <button @click="edit(datum.nurt)" type="button" :disabled="!blok"
                                        class="disabled:bg-gray-200 focus:outline-none text-xs font-medium text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                </td>
                                <td class="px-6 py-4">
                                    <button @click="destroy(datum.nurt)" type="button" :disabled="!blok"
                                        class="disabled:bg-gray-200 focus:outline-none text-xs font-medium text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
