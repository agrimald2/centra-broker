import{A as _}from"./AdminLayout-49f75914.js";import{o as l,c as n,a,u as x,w as h,F as d,Z as f,b as e,g as c,f as y,t as b}from"./app-175760ee.js";import r from"./Create-ad161772.js";import u from"./Edit-5ce74d8b.js";import{B as m}from"./Breadcrumb-069bc475.js";import"./_plugin-vue_export-helper-c27b6911.js";const g={class:"shadow-md sm:rounded-lg relative"},w={class:"px-2 flex items-center justify-between py-4 bg-white"},v=e("i",{class:"ml-2 fa-solid fa-plus font-xl"},null,-1),k={class:"overflow-x-auto"},D={class:"w-full text-sm text-left text-gray-500"},T=e("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50"},[e("tr",null,[e("th",{scope:"col",class:"px-6 py-3"}," Nombre "),e("th",{scope:"col",class:"px-6 py-3"}," Status "),e("th",{scope:"col",class:"px-6 py-3"}," Accción ")])],-1),C={class:"bg-white border-b hover:bg-gray-50"},B={scope:"row",class:"flex items-center px-6 py-4 text-gray-900 whitespace-nowrap"},A=e("i",{class:"fa-solid fa-passport text-3xl text-indigo-600"},null,-1),E={class:"pl-3"},L={class:"text-base font-semibold"},N={class:"px-6 py-4"},M={key:0,class:"flex items-center"},V=e("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),$={key:1,class:"flex items-center"},j=e("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),q={class:"px-6 py-4"},F=["onClick"],I=["onClick"],S={components:{Create:r,Edit:u,Breadcrumb:m},props:["document_types","breadcrumbs"],data(){return{}},methods:{showModal(o){let t=document.getElementById(o);t.classList.remove("slide-out-bck-center"),t.classList.remove("no-display")},async deleteDocumentType(o){try{const t=await axios.delete("/admin/document_types/"+o);window.location.reload()}catch(t){console.log(t)}}},mounted(){}},P=Object.assign(S,{__name:"Index",setup(o){return(t,i)=>(l(),n(d,null,[a(x(f),{title:"Tipos de Documentos"}),a(_,null,{default:h(()=>[a(m,{breadcrumbs:o.breadcrumbs},null,8,["breadcrumbs"]),e("div",g,[e("div",w,[e("button",{type:"button",onClick:i[0]||(i[0]=s=>t.showModal("createDocumentType")),class:"text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 mr-2 mb-2"},[c(" Tipo de Documento "),v])]),e("div",k,[e("table",D,[T,e("tbody",null,[(l(!0),n(d,null,y(o.document_types,(s,O)=>(l(),n("tr",C,[e("th",B,[A,e("div",E,[e("div",L,b(s.name),1)])]),e("td",N,[s.deleted_at?(l(),n("div",$,[j,c(" Eliminado ")])):(l(),n("div",M,[V,c(" Activo ")]))]),e("td",q,[e("i",{onClick:p=>t.showModal("editDocumentType"+s.id),class:"fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer ml-2"},null,8,F),a(u,{id:"editDocumentType"+s.id,document_type:s},null,8,["id","document_type"]),e("i",{onClick:p=>t.deleteDocumentType(s.id),class:"fa-solid fa-square-xmark text-3xl text-red-500 cursor-pointer ml-2"},null,8,I)])]))),256))])])])]),a(r,{id:"createDocumentType"})]),_:1})],64))}});export{P as default};
