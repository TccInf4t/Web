<div id="slider">
				<ul id="slides">
				<?php

					$sql="select * from imagem where classname='TSlideHome'";
					$select=mysql_query($sql);

					while($img=mysql_fetch_array($select)){

				?>
					<li class="slideItem" <?php echo('style="background-image:url(CMS/'.$img['caminho'].');"'); ?>><h2><?php echo (strip_tags($img['nome'])); ?></h2></li>
					<?php
					}
					?>
				</ul>
				<div class="sliderBtn" id="btnEsquerdo"></div>
				<div class="sliderBtn" id="btnDireito"></div>
			</div>

			<div id="conteudo">

<h1 class="caixaTitulo">produtos mais comprados</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg1">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					
					<div class="caixa" id="caixaProduto">
						<div class="caixaImg" id="caixaImg2">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					
					<div class="caixa">
						<div class="caixaImg" id="caixaImg3">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>
				
				<h1 class="caixaTitulo">recomendados</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg4">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg5">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg6">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>
				<?php

					$sql="select * from conteudosite where classname='TDica' order by oid_conteudosite desc";
				
					$select=mysql_query($sql);

					$dica=mysql_fetch_array($select);	

				?>
				<!-- Dicas -->
				<div id="caixaDica">
					<h1>
						<?php echo(strip_tags($dica['titulo'])); ?>
						<a href="<?php echo('dicas.php?oid='.$dica['oid_conteudosite']); ?>" id="outrasDicas">ver outras dicas</a>
					</h1>
					<p>
						<?php echo(strip_tags($dica['descricao'])); ?>
					</p>
				</div>
				
				<h1 class="caixaTitulo">promoções</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg7">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg8">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg9">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>

				<h1 class="caixaTitulo">novidades</h1>
				<div class="caixaLn">
					<div class="caixa">
						<div class="caixaImg" id="caixaImg10">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>

					<div class="caixa">
						<div class="caixaImg" id="caixaImg11">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
					<div class="caixa">
						<div class="caixaImg" id="caixaImg12">
							<div class="btnAdicionar"></div>
						</div>
						<div class="caixaNota">
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
							<span class="caixaNotaImg"></span>
						</div>
						<div class="caixaInfo">
							<span class="nome">capa para volante</span>
							<span class="preco">R$ 200,00</span>
						</div>
					</div>
				</div>
				</div>