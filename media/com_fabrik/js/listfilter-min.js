var FbListFilter=new Class({Implements:[Options,Events],options:{container:"",type:"list",id:"",advancedSearch:{}},initialize:function(d){this.filters=$H({});this.setOptions(d);this.advancedSearch=false;this.container=document.id(this.options.container);this.filterContainer=this.container.getElement(".fabrikFilterContainer");var a=this.container.getElement(".toggleFilters");if(typeOf(a)!=="null"){a.addEvent("click",function(f){var g=a.getPosition();f.stop();var b=g.x-this.filterContainer.getWidth();var h=g.y+a.getHeight();var c=this.filterContainer.getStyle("display")==="none"?this.filterContainer.show():this.filterContainer.hide();this.filterContainer.fade("toggle");this.container.getElements(".filter, .listfilter").toggle()}.bind(this));if(typeOf(this.filterContainer)!=="null"){this.filterContainer.fade("hide").hide();this.container.getElements(".filter, .listfilter").toggle()}}if(typeOf(this.container)==="null"){return}this.getList();var e=this.container.getElement(".clearFilters");if(typeOf(e)!=="null"){e.removeEvents();e.addEvent("click",function(c){var b;c.stop();this.container.getElements(".fabrik_filter").each(function(g){if(g.get("tag")==="select"){g.selectedIndex=0}else{g.value=""}});b=this.getList().plugins;if(typeOf(b)!=="null"){b.each(function(f){f.clearFilter()})}new Element("input",{name:"resetfilters",value:1,type:"hidden"}).inject(this.container);if(this.options.type==="list"){this.list.submit("list.clearfilter")}else{this.container.getElement("form[name=filter]").submit()}}.bind(this))}if(advancedSearchButton=this.container.getElement(".advanced-search-link")){advancedSearchButton.addEvent("click",function(f){f.stop();var c=Fabrik.liveSite+"index.php?option=com_fabrik&view=list&tmpl=component&layout=_advancedsearch&listid="+this.options.id;c+="&listref="+this.options.ref;this.windowopts={id:"advanced-search-win"+this.options.ref,title:Joomla.JText._("COM_FABRIK_ADVANCED_SEARCH"),loadMethod:"xhr",evalScripts:true,contentURL:c,width:690,height:300,y:this.options.popwiny,onContentLoaded:function(h){var g=Fabrik.blocks["list_"+this.options.ref];g.advancedSearch=new AdvancedSearch(this.options.advancedSearch)}.bind(this)};var b=Fabrik.getWindow(this.windowopts)}.bind(this))}},getList:function(){this.list=Fabrik.blocks[this.options.type+"_"+this.options.ref];return this.list},addFilter:function(a,b){if(this.filters.has(a)===false){this.filters.set(a,[])}this.filters.get(a).push(b)},onSubmit:function(){if(this.filters.date){this.filters.date.each(function(a){a.onSubmit()})}},onUpdateData:function(){if(this.filters.date){this.filters.date.each(function(a){a.onUpdateData()})}},getFilterData:function(){var a={};this.container.getElements(".fabrik_filter").each(function(c){if(c.id.test(/value$/)){var b=c.id.match(/(\S+)value$/)[1];if(c.get("tag")==="select"&&c.selectedIndex!==-1){a[b]=document.id(c.options[c.selectedIndex]).get("text")}else{a[b]=c.get("value")}a[b+"_raw"]=c.get("value")}}.bind(this));return a},update:function(){this.filters.each(function(a,b){a.each(function(c){c.update()}.bind(this))}.bind(this))}});