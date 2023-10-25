import{r as _,o,c as i,a as n,u as m,w as g,F as p,Z as y,b as s,h as l,d as h,i as b,e as f,t as d,g as c}from"./app-f20ad74b.js";import{A as x}from"./AdminLayout-0f0883b1.js";import{B as v}from"./Breadcrumb-ee9ab2fd.js";import"./_plugin-vue_export-helper-c27b6911.js";const w={class:"py-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 border-b pb-5 border-gray-900/10"},C={class:"sm:col-span-4 col-span-12"},k=s("label",{for:"first-name",class:"block text-sm font-medium leading-6 text-gray-900"},[c(" Buscar x Tipo de Activo "),s("button",{type:"button",disabled:"",class:"ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:focus:ring-gray-600 mr-2 mb-2"},[s("i",{class:"fa-solid fa-box font-xl"})])],-1),V={class:"mt-2 bg-white"},A={key:0,class:"sm:col-span-4 col-span-12"},B=s("label",{for:"first-name",class:"block text-sm font-medium leading-6 text-gray-900"},[c(" Buscar Por: "),s("button",{type:"button",disabled:"",class:"ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:focus:ring-gray-600 mr-2 mb-2"},[s("i",{class:"fa-solid fa-filter font-xl"})])],-1),T={class:"mt-2 bg-white"},N={key:1,class:"sm:col-span-4 col-span-12"},D=s("label",{for:"first-name",class:"block text-sm font-medium leading-6 text-gray-900"},[c(" Ingrese Valor Buscado: "),s("button",{type:"button",disabled:"",class:"ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:focus:ring-gray-600 mr-2 mb-2"},[s("i",{class:"fa-solid fa-search font-xl"})])],-1),M={class:"bg-white"},Z=["type","placeholder"],F={class:"overflow-x-auto"},L={key:0,class:"w-full text-sm text-left text-gray-500 table"},P=s("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50"},[s("tr",null,[s("th",{scope:"col",class:"px-6 py-3"}," Tipo "),s("th",{scope:"col",class:"px-6 py-3"}," Valor Asegurado "),s("th",{scope:"col",class:"px-6 py-3"}," Vigencia "),s("th",{scope:"col",class:"px-6 py-3"}," Poliza "),s("th",{scope:"col",class:"px-6 py-3"}," Siniestro ")])],-1),S={class:"bg-white border-b hover:bg-gray-50"},U={class:"px-6 py-4"},j={class:"text-base font-semibold"},z={class:"px-6 py-4"},E={class:"px-6 py-4"},I={class:"px-6 py-4"},O=["href"],q={class:"px-6 py-4"},G=["href"],H=s("i",{class:"fa-solid fa-car-burst text-xl"},null,-1),J=[H],K={key:1,class:"text-base font-semibold"},Q={key:1,role:"status",class:"flex justify-center"},R=s("svg",{"aria-hidden":"true",class:"w-24 h-24 mr-2 mt-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600",viewBox:"0 0 100 101",fill:"none",xmlns:"http://www.w3.org/2000/svg"},[s("path",{d:"M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z",fill:"currentColor"}),s("path",{d:"M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z",fill:"currentFill"})],-1),W=s("span",{class:"sr-only"},"Loading...",-1),X=[R,W],Y={components:{},props:["breadcrumbs"],data(){return{assets_types:[],assets_types_attributes:[],assets_type_id:null,assets_types_attributes_id:null,assets_types_attribute:null,searched_value:[],result_assets:[]}},methods:{async getAssetsTypes(){try{const a=await axios.get("/api/assets_types");this.assets_types=a.data}catch(a){console.log(a)}},async getAssetsTypesAttributes(){try{const a=await axios.get("/api/assets_types_attributes",{params:{assets_type_id:this.assets_type_id}});this.assets_types_attributes=a.data}catch(a){console.log(a)}},async searchAssets(){this.result_assets=null;try{const a=await axios.get("/api/search_assets",{params:{asset_type_attribute_id:this.assets_types_attribute.id,value:this.searched_value}});this.result_assets=a.data}catch(a){console.log(a)}}},mounted(){this.getAssetsTypes()},watch:{assets_type_id(){this.getAssetsTypesAttributes()},searched_value(){this.searchAssets()}}},as=Object.assign(Y,{__name:"Search",setup(a){return(e,r)=>{const u=_("v-select");return o(),i(p,null,[n(m(y),{title:"Dashboard"}),n(x,null,{default:g(()=>[n(v,{breadcrumbs:a.breadcrumbs},null,8,["breadcrumbs"]),s("div",w,[s("div",C,[k,s("div",V,[n(u,{modelValue:e.assets_type_id,"onUpdate:modelValue":r[0]||(r[0]=t=>e.assets_type_id=t),options:e.assets_types,reduce:t=>t.id,label:"name"},null,8,["modelValue","options","reduce"])])]),e.assets_types_attributes.length>0?(o(),i("div",A,[B,s("div",T,[n(u,{modelValue:e.assets_types_attribute,"onUpdate:modelValue":r[1]||(r[1]=t=>e.assets_types_attribute=t),options:e.assets_types_attributes,label:"name"},null,8,["modelValue","options"])])])):l("",!0),e.assets_types_attribute?(o(),i("div",N,[D,s("div",M,[h(s("input",{type:e.assets_types_attribute.input_type,name:"name",id:"name","onUpdate:modelValue":r[2]||(r[2]=t=>e.searched_value=t),class:"bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-2 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:e.assets_types_attribute.example},null,8,Z),[[b,e.searched_value]])])])):l("",!0)]),s("div",F,[e.result_assets?(o(),i("table",L,[P,s("tbody",null,[e.result_assets?(o(!0),i(p,{key:0},f(e.result_assets.assets,t=>(o(),i("tr",S,[s("th",U,[s("div",j,d(t.asset.asset_type.name),1)]),s("td",z,d(t.asset.insured_amount),1),s("td",E,d(t.asset.vigency_date),1),s("td",I,[s("a",{href:"/admin/insurance_policies/show/"+t.asset.insurance_policy_data.insurance_policy_id,class:"text-white bg-indigo-800 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 mr-2 mb-2"}," Poliza ",8,O)]),s("td",q,[t.asset.incidents.length>0?(o(),i("a",{key:0,href:"/admin/incidents/show/"+t.asset.incidents.id,class:"text-white bg-red-800 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 mr-2 mb-2"},J,8,G)):(o(),i("div",K," Ninguno "))])]))),256)):l("",!0)])])):(o(),i("div",Q,X))])]),_:1})],64)}}});export{as as default};
