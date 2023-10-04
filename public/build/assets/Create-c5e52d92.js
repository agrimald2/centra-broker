import{h as r,o as i,c as d,b as e,e as c,i as u}from"./app-175760ee.js";import{_ as m}from"./_plugin-vue_export-helper-c27b6911.js";const f={components:{},props:["id"],data(){return{formData:{name:""}}},methods:{async submit(){try{const t=await r.post("/admin/customer_types",this.formData);window.location.reload()}catch(t){console.log(t)}},hideModal(){let t=document.getElementById(this.id);t.classList.add("slide-out-bck-center"),setTimeout(()=>{t.classList.add("no-display")},500)}},mounted(){}},p=["id"],h={class:"relative max-w-xl max-h-full m-auto",style:{"min-width":"30%"}},b={class:"relative bg-white rounded-lg shadow"},x=e("svg",{class:"w-3 h-3",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 14 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"})],-1),g=e("span",{class:"sr-only"},"Close modal",-1),_=[x,g],y={class:"px-6 py-6 lg:px-8"},w=e("h3",{class:"mb-4 text-xl font-medium text-gray-900"},"Crear Tipo de Cliente",-1),v={class:"space-y-6"},k=e("label",{for:"name",class:"block mb-2 text-sm font-medium text-gray-900"}," Nombre ",-1),C={class:"relative"},D=e("div",{class:"absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"},[e("i",{class:"fa-solid fa-passport"})],-1);function M(t,s,a,B,n,l){return i(),d("div",{id:a.id,tabindex:"-1",class:"no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full"},[e("div",h,[e("div",b,[e("button",{type:"button",onClick:s[0]||(s[0]=(...o)=>l.hideModal&&l.hideModal(...o)),class:"absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"},_),e("div",y,[w,e("div",v,[e("div",null,[k,e("div",C,[D,c(e("input",{type:"text",name:"name",id:"name","onUpdate:modelValue":s[1]||(s[1]=o=>n.formData.name=o),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"John Doe"},null,512),[[u,n.formData.name]])])]),e("button",{type:"button",onClick:s[2]||(s[2]=(...o)=>l.submit&&l.submit(...o)),class:"w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase"},"Crear")])])])])],8,p)}const E=m(f,[["render",M]]);export{E as default};
