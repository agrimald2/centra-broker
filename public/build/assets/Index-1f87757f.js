import{A as b}from"./AdminLayout-76a3f45d.js";import{o as r,c as a,a as d,u as _,w as p,F as i,Z as f,b as e,d as n,e as m,t as l}from"./app-08188200.js";import h from"./Create-75eb0a37.js";import x from"./Edit-7584feb2.js";import{B as y}from"./Breadcrumb-eca63e44.js";import"./_plugin-vue_export-helper-c27b6911.js";const k={class:"shadow-md sm:rounded-lg relative"},v={class:"px-2 flex items-center justify-between py-4 bg-white dark:bg-gray-800"},w=e("i",{class:"ml-2 fa-solid fa-user-plus font-xl"},null,-1),L={class:"overflow-x-auto"},U={class:"w-full text-sm text-left text-gray-500 dark:text-gray-400 table"},C=e("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[e("tr",null,[e("th",{scope:"col",class:"px-6 py-3"}," Nombre "),e("th",{scope:"col",class:"px-6 py-3"}," Documento "),e("th",{scope:"col",class:"px-6 py-3"}," Status "),e("th",{scope:"col",class:"px-6 py-3"}," Accción ")])],-1),M={class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"},B={scope:"row",class:"flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"},T=e("i",{class:"fa-solid fa-circle-user text-3xl text-indigo-600"},null,-1),j={class:"pl-3"},A={class:"text-base font-semibold"},E={class:"font-normal text-gray-500"},H={class:"px-6 py-4"},N=e("br",null,null,-1),V={class:"px-6 py-4"},$={key:0,class:"flex items-center"},q=e("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),D={key:1,class:"flex items-center"},F=e("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),I={class:"px-6 py-4"},S=["onClick"],O=["onClick"],Z={class:"flex items-center justify-between p-4","aria-label":"Table navigation"},z={class:"text-sm font-normal text-gray-500 dark:text-gray-400"},G={class:"font-semibold text-gray-900 dark:text-white"},J={class:"font-semibold text-gray-900 dark:text-white"},K={class:"inline-flex -space-x-px text-sm h-8"},P=["href","innerHTML"],Q=["innerHTML"],R={components:{Create:h,Edit:x,Breadcrumb:y},props:["users","document_types","breadcrumbs"],data(){return{}},methods:{showModal(s){let o=document.getElementById(s);o.classList.remove("slide-out-bck-center"),o.classList.remove("no-display")},async deleteUser(s){try{const o=await axios.delete("/admin/users/"+s);window.location.reload()}catch(o){console.log(o)}}},mounted(){}},oe=Object.assign(R,{__name:"Index",setup(s){return(o,c)=>(r(),a(i,null,[d(_(f),{title:"Usuarios"}),d(b,null,{default:p(()=>[d(y,{breadcrumbs:s.breadcrumbs},null,8,["breadcrumbs"]),e("div",k,[e("div",v,[e("button",{type:"button",onClick:c[0]||(c[0]=t=>o.showModal("createUser")),class:"text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2"},[n(" Añadir Usuario "),w])]),e("div",L,[e("table",U,[C,e("tbody",null,[(r(!0),a(i,null,m(s.users.data,(t,u)=>(r(),a("tr",M,[e("th",B,[T,e("div",j,[e("div",A,l(t.name),1),e("div",E,l(t.email),1)])]),e("td",H,[n(l(t.document_type?t.document_type.name:"")+" ",1),N,n(" "+l(t.document_number),1)]),e("td",V,[t.deleted_at?(r(),a("div",D,[F,n(" Eliminado ")])):(r(),a("div",$,[q,n(" Activo ")]))]),e("td",I,[e("i",{onClick:g=>o.showModal("editUser"+t.id),class:"fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer ml-2"},null,8,S),d(x,{id:"editUser"+t.id,document_types:s.document_types,user:t},null,8,["id","document_types","user"]),e("i",{onClick:g=>o.deleteUser(t.id),class:"fa-solid fa-square-xmark text-3xl text-red-500 cursor-pointer ml-2"},null,8,O)])]))),256))])])]),e("nav",Z,[e("span",z,[e("span",G,l(s.users.from)+" a "+l(s.users.to),1),n(" de "),e("span",J,l(s.users.total),1)]),e("ul",K,[(r(!0),a(i,null,m(s.users.links,(t,u)=>(r(),a("li",{key:u},[t.url?(r(),a("a",{key:0,href:t.url,class:"flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white",innerHTML:t.label},null,8,P)):(r(),a("span",{key:1,innerHTML:t.label,class:"flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"},null,8,Q))]))),128))])])]),d(h,{id:"createUser",document_types:s.document_types},null,8,["document_types"])]),_:1})],64))}});export{oe as default};
