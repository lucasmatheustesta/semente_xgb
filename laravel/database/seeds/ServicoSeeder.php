<?php

use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("servicos")->insert([
            [
                'title'      => "Aparelho de Contenção Final - Arcada Inferior",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho de Contenção Final - Arcada Superior",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Extra Bucal ",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Móvel com Parafuso Expansor",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Ortodôntico Fixo Arcada Inferior",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Ortodôntico Fixo Arcada Superior",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Ortodôntico Fixo Parcial - Arcada Inferior",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Ortodôntico Fixo Parcial - Arcada Superior",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho Ortodôntico Funcional ",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho de Protrusão Mandibular",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Arco ou Barra Palatina",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Arco Vestibular de Bumper",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Disjuntor Palatino",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Grade Palatina Fixa",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Grade Palatina Móvel",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Jones Jig",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Mantenedor de Espaço Fixo ou Móvel - Arco Lingual ou Alça Banda",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Manutenção de Aparelho Fixo",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Manutenção de Aparelho Móvel",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Máscara Facial",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Mentoneira",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Placa para Pequenos Movimentos - Placa de Hawley",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Plano Inclinado de Acrílico",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Quadri-Hélice",
                'type'     => "ortodontia",
                'description'     => "",
            ], 
            [
                'title'      => "Ajuste Oclusal - Por Sessão",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Conserto de Prótese (Inclusive Substituição de Dentes)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Coroa In Ceram",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Coroa Metalo Cerâmica",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Coroa Provisória - Por Elemento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Encaixe Fêmea ou Macho - Por Elemento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Núcleo Metálico Fundido",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Placa de Mordida Miorrelaxante (Acrílica)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Placa de Mordida de Proteção (Silicone)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Pôntico - Elemento da Ponte Fixa Metalo Cerâmico",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Pôntico - Elemento da Ponte Fixa Metalo Plástico",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Ponto de Solda",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Fixa Adesiva Metalo-Cerâmica - 1 Elemento faltante",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Fixa Adesiva Metalo-Plástica - 1 Elemento faltante",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Parcial Removível com Encaixe min. 3 elementos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Parcial Removível com Grampos min. 3 elementos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Parcial Removível Provisória",
                'type'     => "outros",
                'description'     => "Provisória com ou sem Grampos min. 3 elementos",
            ], 
            [
                'title'      => "Prótese Parcial Romovível mais de 3 elementos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Total (Dentadura) - Por Arcada - Dentes Nacionais",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese Total Provisória - Por Arcada - Dentes Nacionais",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Remoção de Coroa ou Núcleo",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração Onlay/Inlay",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração Onlay de Cerâmica",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Micro Parafuso parafuso para componente Protético",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto Ósseo por elemento ",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto Ósseo em Alógeno para Levantamento de Seio Maxilar",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto Ósseo em Bloco Autógeno por Elemento (2 Elemento)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto Ósseo para Levantamento de Seio Maxilar (2 Elementos)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Implante Dentário – Por Elemento (Independente do nº de Raízes)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Dentadura sobre Implante - Por Arcada (over dentury)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Plasma Rico em Plaquetas – PRP",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Micro Parafuso para Componente Protético",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Prótese sobre Implante",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Protocolo sobre Implante dentário Metalo Plástico por arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Protocolo sobre Implante dentário Porcelana por arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Pôntico – Prótese Sobre Implante",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Implante Zigomático",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Coroa Provisória - Por Elemento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Implante Dentário – Por Elemento (elementos com grande perda óssea)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Abutmente intermediário p/ prótese sobre implante",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Protótipo em 3D do local onde ocorrerá o implante dentário ",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto de Gengiva Artificial em Cerâmica por hemi arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto de Tecido Conjuntivo por Elemento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto Gengival Livre por Elemento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Alveoloplastia - Por Hemi-Arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Aparelho de Ronco e Apnéia",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Apicectomia Biradicular",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Apicectomia Triradicular",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Apicectomia Uniradicular",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Apicetomia Biradicular com Obturação Retrógrada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Apicetomia Triradicular com Obturação Retrógrada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Cirurgia de Cisto",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Cirurgia de Osteoma ou Odontoma",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Cirurgia para Torus Palatino",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Correção de Bridas Musculares - Por Hemi-Arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Dispositivo para Tracionamento de Dente Incluso",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Exodontia de Decíduo (Dente de Leite)",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Exodontia de Dente Incluso ou Impactado",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Exodontia de Permanentes",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Exodontia de Restos Radiculares",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Exodontia de Supraextra numerário Impactado",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Frenectomia",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Infiltração Intra Muscular e/ou Intra Articular",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Manipulação Mandibular",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Manutenção Trimestral Aparelho Ronco e Apnéia",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Mini Implante",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Placa Estabilizadora",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Placa Reposicionadora ",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Reimplante - Por Elemento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Remoção de Corpo Estranho no Seio Maxilar",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento de DTM",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Aumento da Coroa Clínica",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Cirurgia de Retalho – Por Hemi-Arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Dessensibilização Dentária",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Enxerto Livre",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Ferulização",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Gengivectomia ou Gengivectoplastia",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Gengivectomia ou Gengivoplastia",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Raspagem Supra Gengival",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Raspagem Supra e Sub Gengival",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Clareamento de Dente Desvitalizado ",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Drenagem de Abcesso",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Pino Intra Canal",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Pulpotomia",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Remoção de Núcleo Intrarradicular",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Remoção de Obturação Radicular para Retratamento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento de Perfuração",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento Endodôntico - 1 Conduto",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento Endodôntico - 2 Condutos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento Endodôntico - 3 Condutos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento Endodôntico - 4 Condutos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Capeamento Pulpar sem Restauração Final ",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Desgaste Seletivo - Por Hemi Arcada",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Faceta de Resina Fotopolimerizável",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Núcleo de Preenchimento",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração de Amálgama - 1 Face",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração de Amálgama - 2 Faces",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração de Amálgama - 3 Faces",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração de Amálgama - 4 Faces ou Mais",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração de Ionômero de Vidro",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração Fotopolimerizável - 1 Face ",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração Fotopolimerizável - 2 Faces",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração Fotopolimerizável - 3 Faces ou Mais",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Restauração Fotopolimerizável - 4 Faces ou Mais",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Remineralização",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Tratamento Endodôntico em Decíduos",
                'type'     => "outros",
                'description'     => "",
            ], 
            [
                'title'      => "Ulectomia",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Ulotomia",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Aplicação de Flúor",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Aplicação de Selante",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Consulta de Orientação Pediátrica",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Profilaxia (Tartarectomia + Polimento Coronário)",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Consulta de Emergência",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Consulta de Urgência – Noturna/Final de Semana/Feriado",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Consulta Inicial (Exame Clínico e Plano de Tratamento)",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Radiografia da ATM - 3 incidências",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Radiografia Interproximal",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Radiografia Oclusal",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Radiografia Panorâmica",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Radiografia Panorâmica para Implante Dentário",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Radiografia Periapical ou Bite-Wing",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Teleradiografia com Traçado",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Teleradiografia sem Traçado",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Computadorizada",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia de ATM (Boca Fechada/Repouso/Aberta-Lateral e Frontal)",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia de ATM (Boca Fechada-Aberta/Lateral e Frontal)",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia de ATM (Boca Fechada-Aberta/Lateral)",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Linear para Implante - 2 incidências",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Panorâmica Telerr D/E, Reconstrução Transversal Anterior",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Volumétrica para 1 Hemi-Arco",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Volumétrica para 1 Implante",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Volumétrica para 2 Hemi-Arcos",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Volumétrica para 3 Hemi-Arco",
                'type'     => "outros",
                'description'     => "",
            ],
            [
                'title'      => "Tomografia Volumétrica para 4 Hemi-Arco ",
                'type'     => "outros",
                'description'     => "",
            ]
        ]);
    }
}
