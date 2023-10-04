import{h as g,o as l,c as n,b as e,e as d,j as y,F as u,f as _,i as r,g as p,d as h,t as c,v as f}from"./app-175760ee.js";import{_ as x}from"./_plugin-vue_export-helper-c27b6911.js";const v={components:{},props:["id","policy_vigency_date"],data(){return{assets_types:[],asset_type:null,insured_amount:null,vigency_date:this.policy_vigency_date,assets_attributes_data:{},insuranced_people:null}},methods:{async submit(){try{const s={asset_type_id:this.asset_type.id,asset_type_name:this.asset_type.name,insured_amount:this.insured_amount,vigency_date:this.vigency_date,assets_attributes_data:this.assets_attributes_data,insuranced_people:this.insuranced_people};this.$emit("asset-added",s),this.hideModal()}catch(s){console.log(s)}},hideModal(){let s=document.getElementById(this.id);s.classList.add("slide-out-bck-center"),setTimeout(()=>{s.classList.add("no-display")},500)},async getAssetsTypes(){try{const s=await g.get("/api/assets_types");this.assets_types=s.data}catch(s){console.log(s)}}},mounted(){this.getAssetsTypes(),this.vigency_date=this.policy_vigency_date},watch:{policy_vigency_date:{immediate:!0,handler(s){this.vigency_date=s}}}},k=["id"],w={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"30%"}},V={class:"relative bg-white rounded-lg shadow"},M=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),A=e("span",{class:"sr-only"},"Close modal",-1),T=[M,A],U={class:"px-6 py-6 lg:px-8"},C=e("h3",{class:"mb-4 text-xl font-medium text-gray-900"},"Añadir ",-1),j={class:"space-y-2"},B={class:"grid grid-cols-1 gap-x-6 gap-y-1 sm:grid-cols-6"},D={class:"sm:col-span-6"},N=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Tipo de activo ",-1),S={class:"relative"},F=["value"],L={class:"sm:col-span-6"},E=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Persona Asegurada ",-1),I={class:"relative"},z={class:"sm:col-span-3"},J=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Valor Asegurado (USD) ",-1),P={class:"relative"},q=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-sack-dollar"})],-1),G={class:"sm:col-span-3"},H=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Fin de Vigencia ",-1),K={class:"relative"},O=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-calendar"})],-1),Q=e("div",{class:"inline-flex items-center justify-center w-full"},[e("hr",{class:"w-64 h-px my-2 bg-gray-200 border-0"}),e("span",{class:"absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2"},"Información")],-1),R={key:0,class:"space-y-1"},W={key:0},X=["href"],Y={class:"grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"},Z={class:"sm:col-span-3"},$={for:"name",class:"block mb-2 text-sm font-bold text-indigo-900"},ee={class:"relative"},te=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-circle-info"})],-1),se=["type","onUpdate:modelValue","placeholder"],oe={class:"text-sm text-gray-500"},ae={key:1,class:"text-center"},le=e("h3",{class:"mb-4 text-md font-md text-gray-900"},"Selecciona un Tipo de Activo",-1),ne=[le];function de(s,o,m,ie,a,i){return l(),n("div",{id:m.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",w,[e("div",V,[e("button",{type:"button",onClick:o[0]||(o[0]=(...t)=>i.hideModal&&i.hideModal(...t)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"},T),e("div",U,[C,e("div",j,[e("div",B,[e("div",D,[N,e("div",S,[d(e("select",{"onUpdate:modelValue":o[1]||(o[1]=t=>this.asset_type=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},[(l(!0),n(u,null,_(a.assets_types,t=>(l(),n("option",{value:t,class:"text-gray-900"},c(t.name),9,F))),256))],512),[[y,this.asset_type]])])]),e("div",L,[E,e("div",I,[d(e("input",{type:"text",name:"number",id:"number",autocomplete:"number","onUpdate:modelValue":o[2]||(o[2]=t=>this.insuranced_people=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5",placeholder:"Jhon Doe"},null,512),[[r,this.insuranced_people]])])]),e("div",z,[J,e("div",P,[q,d(e("input",{type:"number","onUpdate:modelValue":o[3]||(o[3]=t=>a.insured_amount=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"23,000"},null,512),[[r,a.insured_amount]])])]),e("div",G,[H,e("div",K,[O,d(e("input",{type:"date","onUpdate:modelValue":o[4]||(o[4]=t=>a.vigency_date=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},null,512),[[r,a.vigency_date]])])])]),Q,a.asset_type?(l(),n("div",R,[a.asset_type.attributes.length==0?(l(),n("div",W,[p(" No hay ningún atributo para este activo, "),e("a",{class:"text-indigo-500 font-bold",href:"/admin/assets_type/"+a.asset_type.id}," añadir ",8,X),p(". ")])):h("",!0),e("div",Y,[(l(!0),n(u,null,_(this.asset_type.attributes,t=>(l(),n("div",Z,[e("label",$,c(t.name),1),e("div",ee,[te,d(e("input",{type:t.input_type,name:"name",id:"name","onUpdate:modelValue":b=>a.assets_attributes_data[t.id]=b,class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:t.example},null,8,se),[[f,a.assets_attributes_data[t.id]]])]),e("span",oe,c(t.description),1)]))),256))])])):(l(),n("div",ae,ne)),e("button",{type:"button",onClick:o[5]||(o[5]=(...t)=>i.submit&&i.submit(...t)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase"},"Crear")])])])])],8,k)}const ue=x(v,[["render",de]]);export{ue as default};
