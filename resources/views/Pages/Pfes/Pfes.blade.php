{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('Titre', 'Titre:') !!}
			{!! Form::text('Titre') !!}
		</li>
		<li>
			{!! Form::label('Specialite', 'Specialite:') !!}
			{!! Form::text('Specialite') !!}
		</li>
		<li>
			{!! Form::label('Realise_par', 'Realise_par:') !!}
			{!! Form::text('Realise_par') !!}
		</li>
		<li>
			{!! Form::label('Encadre_par', 'Encadre_par:') !!}
			{!! Form::text('Encadre_par') !!}
		</li>
		<li>
			{!! Form::label('Mots_cle', 'Mots_cle:') !!}
			{!! Form::text('Mots_cle') !!}
		</li>
		<li>
			{!! Form::label('Resume', 'Resume:') !!}
			{!! Form::text('Resume') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}