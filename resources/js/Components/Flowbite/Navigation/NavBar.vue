<template>
  <nav
    class="bg-white border-b border-gray-200 px-4 py-2.5   fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
      <div class="flex justify-start items-center">
        <button @click="$emit('toggle-sidebar')"
          class="hidden p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100   ">
          <i class="fa-solid fa-bars"></i>
        </button>
        <button @click="$emit('toggle-sidebar')"
          class="lg:hidden p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100   ">
          <i class="fa-solid fa-bars"></i>
        </button>
        <a href="" class="flex mr-4">
          <img src="/logo.png" class="mr-3 h-8" alt="FlowBite Logo" />
        </a>
      </div>
      <p class="text-md font-bold">Bienvenido</p>
    </div>
  </nav>
</template>