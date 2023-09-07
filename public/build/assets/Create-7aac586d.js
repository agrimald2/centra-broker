import{f as n,o as i,c as d,b as e,g as c,v as u}from"./app-08188200.js";import{_ as m}from"./_plugin-vue_export-helper-c27b6911.js";const b={components:{},props:["id"],data(){return{formData:{name:""}}},methods:{async submit(){try{const t=await n.post("/admin/insurance_companies",this.formData);window.location.reload()}catch(t){console.log(t)}},hideModal(){let t=document.getElementById(this.id);t.classList.add("slide-out-bck-center"),setTimeout(()=>{t.classList.add("no-display")},500)}},mounted(){}},f=["id"],g={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"30%"}},h={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},p=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),x=e("span",{class:"sr-only"},"Close modal",-1),y=[p,x],_={class:"px-6 py-6 lg:px-8"},v=e("h3",{class:"mb-4 text-xl font-medium text-gray-900 dark:text-white"},"Crear Aseguradora",-1),w={class:"space-y-6"},k=e("label",{for:"name",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"}," Nombre ",-1),C={class:"relative"},M=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-passport"})],-1);function B(t,o,l,D,r,a){return i(),d("div",{id:l.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",g,[e("div",h,[e("button",{type:"button",onClick:o[0]||(o[0]=(...s)=>a.hideModal&&a.hideModal(...s)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"},y),e("div",_,[v,e("div",w,[e("div",null,[k,e("div",C,[M,c(e("input",{type:"text",name:"name",id:"name","onUpdate:modelValue":o[1]||(o[1]=s=>r.formData.name=s),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"Rimac | Pacífico | La Positiva | ETC"},null,512),[[u,r.formData.name]])])]),e("button",{type:"button",onClick:o[2]||(o[2]=(...s)=>a.submit&&a.submit(...s)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase"},"Crear")])])])])],8,f)}const L=m(b,[["render",B]]);export{L as default};
