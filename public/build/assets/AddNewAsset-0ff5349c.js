import{j as _,o as i,c as a,b as e,d as r,v as p,F as b,e as m,f as d,t as u,h as c,i as h}from"./app-aa82155b.js";import{_ as f}from"./_plugin-vue_export-helper-c27b6911.js";const x={components:{},props:["id","policy_vigency_date","policy_risk_rate"],data(){return{loading:!1,assets_types:[],asset_type:null,insured_amount:null,fix_net_premium:0,insured_amount_type:"USD",risk_rate:this.policy_risk_rate,vigency_date:this.policy_vigency_date,assets_attributes_data:{},insuranced_people:null,newAttribute:{assets_type_id:this.asset_type?this.asset_type.id:null,name:"",input_type:"text",description:"",example:""},showCreateNewAttribute:!1}},methods:{toggleShowCreateNewAttribute(){this.showCreateNewAttribute=!this.showCreateNewAttribute},async submit(){try{const l={asset_type_id:this.asset_type.id,asset_type_name:this.asset_type.name,insured_amount:this.insured_amount,fix_net_premium:this.fix_net_premium,insured_amount_type:this.insured_amount_type,risk_rate:this.risk_rate,vigency_date:this.vigency_date,assets_attributes_data:this.assets_attributes_data,insuranced_people:this.insuranced_people};this.$emit("asset-added",l),this.hideModal(),this.assets_attributes_data={},this.asset_type_id="",this.asset_type_name="",this.insured_amount="",this.fix_net_premium="",this.insuranced_people="",this.insured_amount_type="USD",this.risk_rate=""}catch(l){console.log(l)}},hideModal(){let l=document.getElementById(this.id);l.classList.add("slide-out-bck-center"),setTimeout(()=>{l.classList.add("no-display")},500)},async getAssetsTypes(){try{const l=await _.get("/api/assets_types");this.assets_types=l.data}catch(l){console.log(l)}},async addNewAttributeToAssetType(){try{this.loading=!0,this.newAttribute.assets_type_id=this.asset_type.id;const l=await _.post("/admin/add_assets_type_attribute",this.newAttribute);this.toggleShowCreateNewAttribute(),await this.getAssetsTypes(),this.asset_type=this.assets_types.find(s=>s.id===this.newAttribute.assets_type_id),this.newAttribute={assets_type_id:this.asset_type?this.asset_type.id:null,name:"",input_type:"text",description:"",example:""},this.loading=!1}catch(l){console.log(l)}},getNetPremium(){return this.insured_amount*this.risk_rate/100+this.fix_net_premium}},mounted(){this.getAssetsTypes(),this.vigency_date=this.policy_vigency_date,this.risk_rate=this.policy_risk_rate},watch:{policy_vigency_date:{immediate:!0,handler(l){this.vigency_date=l}}},computed:{getNetPremium(){let l=this.insured_amount*this.risk_rate/100;return this.fix_net_premium=l,l}}},v=["id"],k={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"30%"}},w={class:"relative bg-white rounded-lg shadow"},A=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),C=e("span",{class:"sr-only"},"Close modal",-1),N=[A,C],U={class:"px-6 py-6 lg:px-8"},V=e("h3",{class:"mb-4 text-xl font-medium text-gray-900"},"Añadir ",-1),T={class:"space-y-2"},M={class:"grid grid-cols-1 gap-x-6 gap-y-1 sm:grid-cols-6"},D={class:"sm:col-span-6"},S=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Tipo de activo ",-1),j={class:"relative"},P=["value"],B={class:"sm:col-span-6"},E=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Persona Asegurada ",-1),F={class:"relative"},J={class:"sm:col-span-2"},L=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Valor Asegurado ",-1),I={class:"relative"},Z=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-sack-dollar"})],-1),z={class:"sm:col-span-2"},q=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Moneda ",-1),G={class:"relative"},H=e("option",{value:"USD",class:"text-gray-900",selected:""},"USD",-1),K=e("option",{value:"PEN",class:"text-gray-900"},"PEN",-1),O=[H,K],Q={class:"sm:col-span-2"},R=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Tasa de riesgo ",-1),W={class:"relative"},X=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-percentage"})],-1),Y={class:"sm:col-span-4"},$=e("label",{for:"name",class:"block mb-2 text-md font-bold text-gray-900"}," Inicio de Vigencia ",-1),ee={class:"relative"},te=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-calendar"})],-1),se={class:"sm:col-span-2"},oe={for:"name",class:"block mb-2 text-md font-bold text-gray-900"},le={class:"relative"},re=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-sack-dollar"})],-1),ie=e("div",{class:"inline-flex items-center justify-center w-full"},[e("hr",{class:"w-64 h-px my-2 bg-gray-200 border-0"}),e("span",{class:"absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2"},"Información")],-1),ae={key:0,class:"inline-flex items-center justify-center w-full"},ne=e("div",{role:"status",class:"flex justify-center"},[e("svg",{"aria-hidden":" true",class:"w-24 h-24 mr-2 mt-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600",viewBox:"0 0 100 101",fill:"none",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z",fill:"currentColor"}),e("path",{d:"M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z",fill:"currentFill"})]),e("span",{class:"sr-only"},"Loading...")],-1),de=[ne],ue={key:1,class:"space-y-1"},ce={key:0,class:"space-y-6"},pe={class:"relative"},_e=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-passport"})],-1),be=e("option",{value:"text",class:"text-gray-900"}," Texto ",-1),me=e("option",{value:"number",class:"text-gray-900"}," Numérico ",-1),ge=e("option",{value:"date",class:"text-gray-900"}," Fecha ",-1),ye=[be,me,ge],he={class:"relative"},fe=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-audio-description"})],-1),xe={class:"relative"},ve=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-vial"})],-1),ke={key:1},we={class:"text-center"},Ae={class:"grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"},Ce={class:"sm:col-span-3"},Ne={for:"name",class:"block mb-2 text-sm font-bold text-indigo-900"},Ue={class:"relative"},Ve=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-circle-info"})],-1),Te=["type","onUpdate:modelValue","placeholder"],Me={class:"text-sm text-gray-500"},De={key:2,class:"text-center"},Se=e("h3",{class:"mb-4 text-md font-md text-gray-900"},"Selecciona un Tipo de Activo",-1),je=[Se];function Pe(l,s,g,Be,o,n){return i(),a("div",{id:g.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",k,[e("div",w,[e("button",{type:"button",onClick:s[0]||(s[0]=(...t)=>n.hideModal&&n.hideModal(...t)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"},N),e("div",U,[V,e("div",T,[e("div",M,[e("div",D,[S,e("div",j,[r(e("select",{"onUpdate:modelValue":s[1]||(s[1]=t=>this.asset_type=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},[(i(!0),a(b,null,m(o.assets_types,t=>(i(),a("option",{value:t,class:"text-gray-900"},u(t.name),9,P))),256))],512),[[p,this.asset_type]])])]),e("div",B,[E,e("div",F,[r(e("input",{type:"text",name:"number",id:"number",autocomplete:"number","onUpdate:modelValue":s[2]||(s[2]=t=>this.insuranced_people=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5",placeholder:"Jhon Doe"},null,512),[[d,this.insuranced_people]])])]),e("div",J,[L,e("div",I,[Z,r(e("input",{type:"number","onUpdate:modelValue":s[3]||(s[3]=t=>o.insured_amount=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"23,000"},null,512),[[d,o.insured_amount]])])]),e("div",z,[q,e("div",G,[r(e("select",{"onUpdate:modelValue":s[4]||(s[4]=t=>o.insured_amount_type=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},O,512),[[p,o.insured_amount_type]])])]),e("div",Q,[R,e("div",W,[X,r(e("input",{type:"number","onUpdate:modelValue":s[5]||(s[5]=t=>o.risk_rate=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"23,000"},null,512),[[d,o.risk_rate]])])]),e("div",Y,[$,e("div",ee,[te,r(e("input",{type:"date","onUpdate:modelValue":s[6]||(s[6]=t=>o.vigency_date=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},null,512),[[d,o.vigency_date]])])]),e("div",se,[e("label",oe," Prima Neta ("+u(n.getNetPremium)+" "+u(o.insured_amount_type)+") ",1),e("div",le,[re,r(e("input",{type:"number","onUpdate:modelValue":s[7]||(s[7]=t=>o.fix_net_premium=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"23,000"},null,512),[[d,o.fix_net_premium]])])])]),ie,o.loading?(i(),a("div",ae,de)):c("",!0),o.asset_type?(i(),a("div",ue,[o.showCreateNewAttribute&&!o.loading?(i(),a("div",ce,[e("div",null,[e("div",pe,[_e,r(e("input",{type:"text",name:"name",id:"name","onUpdate:modelValue":s[8]||(s[8]=t=>o.newAttribute.name=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"John Doe"},null,512),[[d,o.newAttribute.name]])])]),e("div",null,[r(e("select",{id:"type",name:"type","onUpdate:modelValue":s[9]||(s[9]=t=>o.newAttribute.input_type=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"},ye,512),[[p,o.newAttribute.input_type]])]),e("div",null,[e("div",he,[fe,r(e("input",{type:"text",name:"name",id:"name","onUpdate:modelValue":s[10]||(s[10]=t=>o.newAttribute.description=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"John Doe"},null,512),[[d,o.newAttribute.description]])])]),e("div",null,[e("div",xe,[ve,r(e("input",{type:"text",name:"name",id:"name","onUpdate:modelValue":s[11]||(s[11]=t=>o.newAttribute.example=t),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"John Doe"},null,512),[[d,o.newAttribute.example]])])]),e("button",{type:"button",onClick:s[12]||(s[12]=(...t)=>n.addNewAttributeToAssetType&&n.addNewAttributeToAssetType(...t)),class:"w-full text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase"},"Añadir Atributo")])):c("",!0),o.asset_type.attributes.length==0?(i(),a("div",ke," No hay ningún atributo para este activo ")):c("",!0),e("div",we,[e("a",{class:"text-indigo-500 font-bold cursor-pointer",onClick:s[13]||(s[13]=(...t)=>n.toggleShowCreateNewAttribute&&n.toggleShowCreateNewAttribute(...t))}," añadir atributo ")]),e("div",Ae,[o.loading?c("",!0):(i(!0),a(b,{key:0},m(this.asset_type.attributes,t=>(i(),a("div",Ce,[e("label",Ne,u(t.name),1),e("div",Ue,[Ve,r(e("input",{type:t.input_type,name:"name",id:"name","onUpdate:modelValue":y=>o.assets_attributes_data[t.id]=y,class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:t.example},null,8,Te),[[h,o.assets_attributes_data[t.id]]])]),e("span",Me,u(t.description),1)]))),256))])])):(i(),a("div",De,je)),e("button",{type:"button",onClick:s[14]||(s[14]=(...t)=>n.submit&&n.submit(...t)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase"},"Crear")])])])])],8,v)}const Je=f(x,[["render",Pe]]);export{Je as default};
