<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
import AddFile from './Modals/AddFile.vue';

</script>
<template>
    <Head title="Crear Póliza" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <form class="px-2">
            <div class="space-y-6">
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Registrar un nuevo siniestro</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Asegúrate de llenar todos los campos
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 border-b pb-5 border-gray-900/10">
                    <div class="col-span-12">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600 uppercase">Información Activo #{{
                            asset.id }}</h2>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Número de Poliza
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Po N° | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.insurancePolicy.number">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Cliente
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Cliente | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.customer.name">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Cliente
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Compañia | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.insurance_policy_data.insurance_company.name">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Tipo de Activo
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Tipo | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.asset_type.name">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Valor Asegurado
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">$ | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.insured_amount">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Prima Neta
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">$ | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.netPremium.toFixed(2)">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Prima Total
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">$ | </span>
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" disabled
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    :value="asset.netTotal.toFixed(2)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 border-b pb-5 border-gray-900/10">
                    <div class="col-span-12">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600 uppercase">Reporte de Incidente</h2>
                    </div>
                    <div class="sm:col-span-2 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Número de Siniestro
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" required
                                    v-model="incident.incident_number"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Número de Caso
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" required
                                    v-model="incident.case_number"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-calendar font-xl"></i>
                            </button>
                            Fecha de Siniestro
                        </label>
                        <div class="mt-1">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <!-- Search and Select People-->
                                <input type="date" v-model="incident.incident_history.incident_date"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Conductor
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" required
                                    v-model="incident.incident_history.driver"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Lugar Ocurrencia
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number"
                                    v-model="incident.incident_history.place"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6 col-span-12">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Resumen de
                            los hechos</label>
                        <textarea id="message" rows="4" v-model="incident.incident_history.summary"
                            class="bg-white block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500   dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Detalla los hechos y ocurrencias"></textarea>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                            Taller
                            <!-- Add People Modal-->
                            <button type="button" @click="showModal('AddWorkShop')"
                                class="ml-2 text-white bg-green-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-user-plus font-xl"></i>
                            </button>
                            <CreateWorkShop :id="'AddWorkShop'" @workshop-added="handleNewWorkShop" />
                        </label>
                        <div class="mt-2 bg-white">
                            <v-select v-model="incident.incident_history.workshop_id" :options="workshops"
                                :reduce="worshop => worshop.id" label="name"></v-select>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                            Fecha de entrada Taller
                        </label>
                        <div class="mt-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="date" v-model="incident.incident_history.workshop_entrance_date"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                            Fecha de Aprobación de Presupuesto
                        </label>
                        <div class="mt-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="date" v-model="incident.incident_history.budget_approval_date"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-3 col-span-12">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            <button type="button" disabled
                                class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-tag font-xl"></i>
                            </button>
                            Ejecutivo
                        </label>
                        <div class="mt-2">
                            <div
                                class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <!-- Search and Select People-->
                                <input type="text" name="number" id="number" autocomplete="number" required
                                    v-model="incident.incident_history.executive"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-6 col-span-12">
                        <div>
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer"
                                        v-model="incident.incident_history.is_bank_endorsed">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">¿Endosada a
                                        Banco?</span>
                                </label>
                            </label>
                            <div class="mt-2">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-10 bg-white">
                                        <v-select v-model="incident.incident_history.bank_id" :options="banks"
                                            :disabled="!incident.incident_history.is_bank_endorsed"
                                            :reduce="bank => bank.id" label="name"></v-select>
                                        <CreateBank :id="'AddBank'" @bank-added="handleNewBank" />
                                    </div>
                                    <div class="col-span-2">
                                        <button type="button" @click="showModal('AddBank')"
                                            class="ml-5 text-white bg-green-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                            <i class="fa-solid fa-user-plus font-xl"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6 col-span-12">
                        <div
                            class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <!-- Search and Select People-->
                            <textarea id="message" rows="4" v-model="incident.incident_history.deductible"
                            class="bg-white block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500   dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Denuncia Policial"></textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-6 col-span-12">
                        <textarea id="message" rows="4" v-model="incident.incident_history.deductible"
                            class="bg-white block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500   dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Deductible"></textarea>
                    </div>
                </div>
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Archivos del siniestro</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Imágenes, PDF's, Excel y cualquier tipo de documento que esté relacionado a la siniestro
                    </p>
                    <button type="button" @click="showModal('AddFile')"
                        class="mt-1 text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        Añadir Archivo
                        <i class="ml-2 fa-solid fa-plus font-xl"></i>
                    </button>
                    <AddFile :id="'AddFile'" @file-added="handleNewFile" />
                    <div class="sm:col-span-3">
                        <div class="mt-10 grid grid-cols-8 gap-y-4">
                            <div v-for="file in incident.incident_history.files"
                                class="sm:col-span-4 md:col-span-2 col-span-4">
                                <div class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg   ">
                                    <button type="button" @click="removeFile(file)"
                                        class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700    dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fa-solid fa-file mr-2"></i>
                                        <span>{{ file.name.length > 10 ? file.name.slice(0, 10) + '...' : file.name
                                        }}</span>
                                        <br>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                <button type="submit" @click.prevent="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Crear
                </button>
            </div>
        </form>
    </AdminLayout>
</template>
<script>
import CreateDriver from './Modals/CreateDriver.vue'
import CreateWorkShop from './Modals/CreateWorkShop.vue'
import CreateExecutive from './Modals/CreateExecutive.vue'
import CreateBank from './Modals/CreateBank.vue'

export default {
    components: {
        CreateDriver, CreateWorkShop, CreateExecutive, CreateBank, AddFile
    },
    props: ['breadcrumbs', 'asset'],
    data() {
        return {
            incident: {
                asset_id: this.asset.id,
                incident_number: null,
                case_number: null,
                incident_history: {
                    incident_date: null,
                    driver: null,
                    place: null,
                    police_station: null,
                    summary: null,
                    have_police_conclusion: false,
                    police_conclusion: null,
                    workshop_id: null,
                    workshop_entrance_date: null,
                    budget_approval_date: null,
                    executive: null,
                    is_bank_endorsed: false,
                    bank_id: null,
                    deductible: null,
                    files: [],
                }
            },
            workshops: [],
            banks: [],
        };
    },
    methods: {
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
        async submit() {
            try {
                const response = await axios.post('/admin/incidents/store', this.incident);
                window.location.href = '/admin/incidents';
                // handle success (e.g., show notification, redirect)
            } catch (error) {
                console.log(error);
                // handle error (e.g., show error message)
            }
        },
        handleNewWorkShop(data) {
            this.workshops.push(data);
            this.incident.incident_history.workshop_id = data.id;
        },
        handleNewBank(data) {
            this.banks.push(data);
            this.incident.incident_history.bank_id = data.id;
        },
        async getWorkshops() {
            try {
                const response = await axios.get('/api/workshops');
                this.workshops = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async getBanks() {
            try {
                const response = await axios.get('/api/banks');
                this.banks = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        handleNewFile(newFile) {
            this.incident.incident_history.files.push(newFile);
        },
    },
    mounted() {
        this.getWorkshops();
        this.getBanks();
    },
};
</script>
<style>
@import "vue-select/dist/vue-select.css";
</style>