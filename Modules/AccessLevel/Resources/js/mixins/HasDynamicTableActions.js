import DynamicTableActionsRenderer from "../components/DynamicTableActions";

const addCSS = s =>(d=>{d.head.appendChild(d.createElement("style")).innerHTML=s})(window.document);

export default {
    data() {
        return {
            frameworkComponents: {
                tableActionsRenderer: DynamicTableActionsRenderer
            }
        }
    },
    mounted() {
	    addCSS(`
	    	[dir] .vs-button.small:not(.includeIconOnly) { padding: 7px}
	    `)
    }
}
