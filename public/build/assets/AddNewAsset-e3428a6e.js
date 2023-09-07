import{f as p,o as r,c as d,b as e,g as i,h as y,F as c,e as u,v as g,d as _,j as m,t as n,k as f}from"./app-08188200.js";import{_ as x}from"./_plugin-vue_export-helper-c27b6911.js";const k={components:{},props:["id"],data(){return{assets_types:[],asset_type:null,insured_amount:null,vigency_date:null,assets_attributes_data:{}}},methods:{async submit(){try{const s={asset_type_id:this.asset_type.id,asset_type_name:this.asset_type.name,insured_amount:this.insured_amount,vigency_date:this.vigency_date,assets_attributes_data:this.assets_attributes_data};this.$emit("asset-added",s),this.hideModal()}catch(s){console.log(s)}},hideModal(){let s=document.getElementById(this.id);s.classList.add("slide-out-bck-center"),setTimeout(()=>{s.classList.add("no-display")},500)},async getAssetsTypes(){try{const s=await p.get("/api/assets_types");this.assets_types=s.data}catch(s){console.log(s)}}},mounted(){this.getAssetsTypes()}},v=["id"],w={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"30%"}},V={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},M=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),A=e("span",{class:"sr-only"},"Close modal",-1),T=[M,A],C={class:"px-6 py-6 lg:px-8"},U=e("h3",{class:"mb-4 text-xl font-medium text-gray-900 dark:text-white"},"Añadir Activo",-1),j={class:"space-y-6"},B={class:"grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"},N={class:"sm:col-span-6"},D=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900 dark:text-white"}," Tipo de activo ",-1),S={class:"relative"},F=["value"],L={class:"sm:col-span-3"},E=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900 dark:text-white"}," Valor Asegurado (USD) ",-1),I={class:"relative"},z=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-sack-dollar"})],-1),q={class:"sm:col-span-3"},G=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900 dark:text-white"}," Fecha de Vigencia ",-1),H={class:"relative"},J=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-calendar"})],-1),K=e("div",{class:"inline-flex items-center justify-center w-full"},[e("hr",{class:"w-64 h-px my-2 bg-gray-200 border-0 dark:bg-gray-700"}),e("span",{class:"absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900"},"Información")],-1),O={key:0,class:"space-y-1"},P={key:0},Q=["href"],R={class:"grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"},W={class:"sm:col-span-3"},X={for:"name",class:"block mb-2 text-sm font-bold text-indigo-900 dark:text-white"},Y={class:"relative"},Z=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-circle-info"})],-1),$=["type","onUpdate:modelValue","placeholder"],ee={class:"text-sm text-gray-500"},te={key:1,class:"text-center"},se=e("h3",{class:"mb-4 text-md font-md text-gray-900 dark:text-white"},"Selecciona un Tipo de Activo",-1),ae=[se];function oe(s,a,b,re,o,l){return r(),d("div",{id:b.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",w,[e("div",V,[e("button",{type:"button",onClick:a[0]||(a[0]=(...t)=>l.hideModal&&l.hideModal(...t)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"},T),e("div",C,[U,e("div",j,[e("div",B,[e("div",N,[D,e("div",S,[i(e("select",{"onUpdate:modelValue":a[1]||(a[1]=t=>this.asset_type=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"},[(r(!0),d(c,null,u(o.assets_types,t=>(r(),d("option",{value:t,class:"text-gray-900"},n(t.name),9,F))),256))],512),[[y,this.asset_type]])])]),e("div",L,[E,e("div",I,[z,i(e("input",{type:"number","onUpdate:modelValue":a[2]||(a[2]=t=>o.insured_amount=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"23,000"},null,512),[[g,o.insured_amount]])])]),e("div",q,[G,e("div",H,[J,i(e("input",{type:"date","onUpdate:modelValue":a[3]||(a[3]=t=>o.vigency_date=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"},null,512),[[g,o.vigency_date]])])])]),K,o.asset_type?(r(),d("div",O,[o.asset_type.attributes.length==0?(r(),d("div",P,[_(" No hay ningún atributo para este activo, "),e("a",{class:"text-indigo-500 font-bold",href:"/admin/assets_type/"+o.asset_type.id}," añadir ",8,Q),_(". ")])):m("",!0),e("div",R,[(r(!0),d(c,null,u(this.asset_type.attributes,t=>(r(),d("div",W,[e("label",X,n(t.name),1),e("div",Y,[Z,i(e("input",{type:t.input_type,name:"name",id:"name","onUpdate:modelValue":h=>o.assets_attributes_data[t.id]=h,class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:t.example},null,8,$),[[f,o.assets_attributes_data[t.id]]])]),e("span",ee,n(t.description),1)]))),256))])])):(r(),d("div",te,ae)),e("button",{type:"button",onClick:a[4]||(a[4]=(...t)=>l.submit&&l.submit(...t)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase"},"Crear")])])])])],8,v)}const ie=x(k,[["render",oe]]);export{ie as default};
