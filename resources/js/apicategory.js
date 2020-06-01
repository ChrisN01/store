const apicategory = new Vue({
    el: '#apicategory',
    	data:{
			name:'',
			slug:'',
			div_messageslug: 'Slug Existe',
			div_class_slug: 'badge badge-danger',
			div_show:false,
			disable_button:1
		},
		computed:{
			generateSlug: function(){
				var char={
					"á":"a","é":"e","í":"i","ó":"o","ú":"u",
					"Á":"E","É":"E","Í":"I","Ó":"O","Ú":"U",
					"ñ":"n","Ñ":"N"," ":"-","_":"-",
				}
				var expression = /[áéíóúÁÉÍÓÚñÑ_ ]/g;
				this.slug = this.name.trim().replace(expression,function(e) {

					return char[e];
				}).toLowerCase()

				return this.slug;

				//return this.name.trim().replace(/ / ,'-').toLowerCase()
			}
		},
		methods:{
			getCategory()
			{

				if(this.slug)
				{
						let url = '/api/category/'+this.slug;
						axios.get(url).then(response => {
							this.div_messageslug = response.data;
							if (this.div_messageslug==="Slug disponible")
							{
								this.div_class_slug = 'badge badge-success';
								this.disable_button = 0;
							}
							else
							{
								this.div_class_slug = 'badge badge-danger';
								this.disable_button=1;
								console.log(this.disable_button);
							}
							
							this.div_show = true;
						})
				}
				else
				{
					this.div_class_slug = 'badge badge-danger';;
					this.div_messageslug = "Por favor escribe una categoría";
					this.disable_button = 1;
					this.div_show = true;
				}


			





			}
		},

		mounted()
		{
			if(document.getElementById('edit').innerHTML)
			{
				this.name = document.getElementById('temp_name').innerHTML;
				this.disable_button = 0;
			}
		}
});