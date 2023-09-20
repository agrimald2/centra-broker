import{o as d,c as r,b as e,e as a,j as c,i as u,t as p,l as m}from"./app-a7d49cf8.js";import{_ as g}from"./_plugin-vue_export-helper-c27b6911.js";const h={components:{},props:["id"],data(){return{file:{name:null,type_id:null}}},methods:{async submit(){try{const o={...this.file};this.$emit("file-added",o),this.hideModal()}catch(o){console.log(o)}},hideModal(){let o=document.getElementById(this.id);o.classList.add("slide-out-bck-center"),setTimeout(()=>{o.classList.add("no-display")},500)},handleFileChange(o){this.file.name=o.target.files[0].name}}},b=["id"],f={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"50%"}},_={class:"relative bg-white rounded-lg shadow"},x=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),y=e("span",{class:"sr-only"},"Close modal",-1),v=[x,y],w={class:"px-6 py-6 lg:px-8"},k=e("h3",{class:"mb-4 text-xl font-medium text-gray-900"},"Añadir Archivo",-1),C={class:"space-y-1"},M={class:"grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mb-4"},D={class:"sm:col-span-6"},S=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Tipo de Archivo ",-1),j={class:"relative"},A=m('<option value="1">Hoja de Cáculo</option><option value="2">Documento de Texto</option><option value="3">PDF</option><option value="4">Audios</option><option value="5">Imágenes</option><option value="6">Videos</option>',6),F=[A],P={class:"sm:col-span-6"},T=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Nombre del archivo ",-1),B={class:"relative"},E=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-tag"})],-1),L={class:"text-sm text-gray-500"},V={class:"sm:col-span-6"},N=e("label",{class:"block mb-2 text-sm font-medium text-gray-900",for:"file_input"},"Subir Archivo",-1),G=e("p",{class:"mt-1 text-sm text-gray-500 dark:text-gray-300",id:"file_input_help"},"PNG, JPG, MP4, MP3, PDF, EXCEL, DOCS, ETC.",-1);function I(o,t,n,U,i,l){return d(),r("div",{id:n.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",f,[e("div",_,[e("button",{type:"button",onClick:t[0]||(t[0]=(...s)=>l.hideModal&&l.hideModal(...s)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"},v),e("div",w,[k,e("div",C,[e("div",M,[e("div",D,[S,e("div",j,[a(e("select",{"onUpdate:modelValue":t[1]||(t[1]=s=>this.asset_type=s),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},F,512),[[c,this.asset_type]])])]),e("div",P,[T,e("div",B,[E,a(e("input",{type:"text",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"ejemplo.pdf","onUpdate:modelValue":t[2]||(t[2]=s=>i.file.name=s)},null,512),[[u,i.file.name]])]),e("span",L,p(`${new Date().toLocaleDateString().replace(/\//g,"-")}-${new Date().toLocaleTimeString().replace(/:/g,".")}-${i.file.name}`),1)]),e("div",V,[N,e("input",{class:"block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:placeholder-gray-400","aria-describedby":"file_input_help",id:"file_input",type:"file",onChange:t[3]||(t[3]=(...s)=>l.handleFileChange&&l.handleFileChange(...s))},null,32),G])]),e("button",{type:"button",onClick:t[4]||(t[4]=(...s)=>l.submit&&l.submit(...s)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase"},"Crear")])])])])],8,b)}const J=g(h,[["render",I]]);export{J as default};
