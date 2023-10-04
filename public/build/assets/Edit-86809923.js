import{h as a,o as i,c as n,b as e,e as c,i as u,t as m}from"./app-175760ee.js";import{_ as p}from"./_plugin-vue_export-helper-c27b6911.js";const _={components:{},props:["id","customer_type"],data(){return{customer_type:this.customer_type}},methods:{async submit(){try{const t=await a.put("/admin/customer_types/"+this.customer_type.id,this.customer_type);window.location.reload()}catch(t){console.log(t)}},hideModal(){let t=document.getElementById(this.id);t.classList.add("slide-out-bck-center"),setTimeout(()=>{t.classList.add("no-display")},500)}},mounted(){}},h=["id"],y={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"30%"}},f={class:"relative bg-white rounded-lg shadow"},b=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),x=e("span",{class:"sr-only"},"Close modal",-1),g=[b,x],w={class:"px-6 py-6 lg:px-8"},v=e("h3",{class:"mb-4 text-xl font-medium text-gray-900"},"Editar Tipo de Cliente ",-1),k={class:"space-y-6"},E=e("label",{for:"name",class:"block mb-2 text-sm font-medium text-gray-900"}," Nombre ",-1),M={class:"relative"},B=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-passport"})],-1),C={key:0},j={key:1};function D(t,s,d,T,l,r){return i(),n("div",{id:d.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",y,[e("div",f,[e("button",{type:"button",onClick:s[0]||(s[0]=(...o)=>r.hideModal&&r.hideModal(...o)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"},g),e("div",w,[v,e("div",k,[e("div",null,[E,e("div",M,[B,c(e("input",{type:"text",name:"name",id:"name","onUpdate:modelValue":s[1]||(s[1]=o=>l.customer_type.name=o),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"John Doe"},null,512),[[u,l.customer_type.name]])])]),e("button",{type:"button",onClick:s[2]||(s[2]=(...o)=>r.submit&&r.submit(...o)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase"},[l.customer_type.deleted_at?(i(),n("span",C,m(l.customer_type.deleted_at?"Restaurar":"Editar"),1)):(i(),n("span",j," Editar "))])])])])])],8,h)}const V=p(_,[["render",D]]);export{V as default};
