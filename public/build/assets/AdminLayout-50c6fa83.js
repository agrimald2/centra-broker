import{_ as c}from"./_plugin-vue_export-helper-c27b6911.js";import{o as n,c as a,b as e,n as g,t as f,F as _,e as p,j as v,r as h,a as d,m as x,p as y,h as $,q as w}from"./app-ae156985.js";const k={name:"NavLink",props:{href:String,text:String,icon:String,color:{type:String,default:"text-gray-500"},textsize:{type:String,default:"text-xl"}},data(){return{isActive:!1}},methods:{},mounted(){}},S=["href"],z={class:"ml-3"};function L(i,r,s,m,o,l){return n(),a("li",null,[e("a",{href:s.href,class:"flex items-center p-2 text-base rounded-lg hover:bg-gray-100 group"},[e("i",{class:g(s.icon+" "+s.color+" "+s.textsize)},null,2),e("span",z,f(s.text),1)],8,S)])}const N=c(k,[["render",L]]),A={name:"NavLink",props:{href:String,text:String,icon:String,childs:Array,color:{type:String,default:"text-gray-500"},textsize:{type:String,default:"text-xl"}},data(){return{isActive:!1,color:"text-gray-500",textsize:"text-xl"}},methods:{toggleDropdown(){this.isActive=!this.isActive}},mounted(){}},B={class:"ml-3"},C=e("svg",{"aria-hidden":"true",class:"ml-auto w-6 h-6",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),D=["href"];function V(i,r,s,m,o,l){return n(),a("li",null,[e("button",{type:"button",onClick:r[0]||(r[0]=(...t)=>l.toggleDropdown&&l.toggleDropdown(...t)),class:"flex items-center p-2 w-full text-base text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"},[e("i",{class:g(s.icon+" "+o.color+" "+o.textsize)},null,2),e("span",B,f(s.text),1),C]),e("ul",{class:g([{hidden:!o.isActive},"py-2 space-y-2"])},[(n(!0),a(_,null,p(s.childs,t=>(n(),a("li",{key:t.name},[e("a",{href:t.href,class:"flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"},f(t.name),9,D)]))),128))],2)])}const j=c(A,[["render",V]]),P={name:"SideBar",components:{NavLink:N,NavLinkDropdown:j},props:[""],data(){return{}},methods:{logout(){v.post("/logout").then(()=>{location.reload()})}},mounted(){}},T={class:"slide-in-left fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0"},E={class:"overflow-y-auto py-5 px-3 h-full bg-white"},F={class:"space-y-2"},q={class:"pt-5 mt-5 space-y-2 border-t border-gray-200"},G={class:"absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white z-20"},M={class:"inline-flex rounded-md shadow-sm",role:"group"},R=e("i",{class:"fa-solid fa-right-from-bracket"},null,-1),U=[R];function W(i,r,s,m,o,l){const t=h("NavLink"),u=h("NavLinkDropdown");return n(),a("aside",T,[e("div",E,[e("ul",F,[d(t,{href:"/admin/dashboard",text:"Dashboard",icon:"fa-solid fa-dashboard"}),d(t,{href:"/admin/customers",text:"Clientes",icon:"fa-solid fa-user-tie"}),d(t,{href:"/admin/assets/index",text:"Activos",icon:"fa-solid fa-box"}),d(u,{text:"Pólizas",icon:"fa-solid fa-gear",childs:[{name:"Polizas de seguros",href:"/admin/insurance_policies"},{name:"Añadir Poliza",href:"/admin/insurance_policies/create"}]}),d(u,{text:"Siniestros",icon:"fa-solid fa-car-burst",childs:[{name:"Lista de Siniestros ",href:"/admin/incidents"},{name:"Registrar un siniestro ",href:"/admin/assets/search_index"}]})]),e("ul",q,[d(t,{href:"/admin/users",text:"Usuarios",icon:"fa-solid fa-users"}),d(t,{href:"/admin/insurance_companies",text:"Aseguradoras",icon:"fa-solid fa-building "}),d(u,{text:"Configuración",icon:"fa-solid fa-gear",childs:[{name:"Tipos de Clientes",href:"/admin/customer_types"},{name:"Tipos de Documentos",href:"/admin/document_types"},{name:"Estados de Pólizas",href:"/admin/insurance_policies_statuses"},{name:"Tipos de Activos",href:"/admin/assets_types"}]})])]),e("div",G,[e("div",M,[e("button",{type:"button",onClick:r[0]||(r[0]=b=>l.logout()),class:"inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:focus:ring-blue-500 dark:focus:text-white"},U)])])])}const H=c(P,[["render",W]]),I={},J={class:"bg-white border-b border-gray-200 px-4 py-2.5 fixed left-0 right-0 top-0 z-50"},K={class:"flex flex-wrap justify-between items-center"},O={class:"flex justify-start items-center"},Q=e("i",{class:"fa-solid fa-bars"},null,-1),X=[Q],Y=e("i",{class:"fa-solid fa-bars"},null,-1),Z=[Y],ee=e("a",{href:"",class:"flex mr-4"},[e("img",{src:"/logo.png",class:"mr-3 h-8",alt:"FlowBite Logo"})],-1),re=e("p",{class:"text-md font-bold"},"Bienvenido",-1);function se(i,r){return n(),a("nav",J,[e("div",K,[e("div",O,[e("button",{onClick:r[0]||(r[0]=s=>i.$emit("toggle-sidebar")),class:"hidden p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100"},X),e("button",{onClick:r[1]||(r[1]=s=>i.$emit("toggle-sidebar")),class:"lg:hidden p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100"},Z),ee]),re])])}const te=c(I,[["render",se]]),oe={},de=x('<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4"><div class="border-2 border-dashed border-gray-300 rounded-lg h-32 md:h-64"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-32 md:h-64"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-32 md:h-64"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-32 md:h-64"></div></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-96 mb-4"></div><div class="grid grid-cols-2 gap-4 mb-4"><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-96 mb-4"></div><div class="grid grid-cols-2 gap-4"><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div><div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div></div>',5);function ie(i,r){return de}const ne=c(oe,[["render",ie]]);const ae={name:"AdminLayout",components:{Sidebar:H,NavBar:te,GridExample:ne},props:[""],data(){return{sidebarVisible:window.innerWidth>768}},methods:{},mounted(){}},le={class:"antialiased bg-gray-50"};function ce(i,r,s,m,o,l){const t=h("NavBar"),u=h("Sidebar");return n(),a("div",le,[d(t,{onToggleSidebar:r[0]||(r[0]=b=>o.sidebarVisible=!o.sidebarVisible)}),o.sidebarVisible?(n(),y(u,{key:0})):$("",!0),e("main",{class:g(`p-4 h-auto pt-20 ${o.sidebarVisible?"md:ml-64":"md:ml-0"}`)},[w(i.$slots,"default")],2)])}const he=c(ae,[["render",ce]]);export{he as A};
