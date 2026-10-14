import '@fortawesome/fontawesome-free/css/all.min.css';

const translations = {
    en: {
        'nav.home': 'Home',
        'nav.features': 'Features',
        'nav.howItWorks': 'How it works',
        'nav.getApp': 'Get the App',
        'hero.titlePrefix': 'Help is one tap ',
        'hero.titleAccent': 'away.',
        'hero.description': 'RescMe connects you with your emergency contacts, when you need them the most with automated customizable messages.',
        'hero.download': 'Download the app',
        'hero.imageAlt': 'RescMe app preview',
        'features.title': 'Built for the moments that matter',
        'features.oneTap.title': 'One-tap SOS',
        'features.oneTap.description': 'A single press alerts emergency services and your trusted contacts with your live location.',
        'features.messages.title': 'Custom messages',
        'features.messages.description': 'Create custom messages to notify your emergency contacts with personalized information.',
        'features.location.title': 'Location sharing',
        'features.location.description': 'Share your most recent locations with your emergency contacts for enhanced safety.',
        'steps.title': 'Three steps to safety',
        'steps.contacts.title': 'Create emergency contacts',
        'steps.contacts.description': 'Add your trusted contacts who should be notified in case of an emergency.',
        'steps.messages.title': 'Set up automatic messages',
        'steps.messages.description': 'Configure automatic messages to notify your emergency contacts with your location and status.',
        'steps.location.title': 'Allow location sharing',
        'steps.location.description': 'Allow RescMe to share your location with your emergency contacts during an emergency.',
        'download.tagline': 'Because everyone deserves to feel safe.',
        'download.description': 'Download RescMe today and set up your safety network in under two minutes.',
        'download.android': 'Download for Android',
        'footer.tagline': '© 2026 RescMe. Help is one tap away.',
        'footer.terms': 'Terms',
        'footer.contact': 'Contact',
    },
    es: {
        'nav.home': 'Inicio',
        'nav.features': 'Funciones',
        'nav.howItWorks': 'Cómo funciona',
        'nav.getApp': 'Descargar la app',
        'hero.titlePrefix': 'La ayuda está a un toque ',
        'hero.titleAccent': 'de distancia.',
        'hero.description': 'RescMe te conecta con tus contactos de emergencia cuando más los necesitas, mediante mensajes automáticos personalizables.',
        'hero.download': 'Descargar la app',
        'hero.imageAlt': 'Vista previa de la app RescMe',
        'features.title': 'Diseñada para los momentos importantes',
        'features.oneTap.title': 'SOS con un toque',
        'features.oneTap.description': 'Con un solo toque, avisa a los servicios de emergencia y a tus contactos de confianza con tu ubicación en tiempo real.',
        'features.messages.title': 'Mensajes personalizados',
        'features.messages.description': 'Crea mensajes personalizados para avisar a tus contactos de emergencia con información relevante.',
        'features.location.title': 'Compartir ubicación',
        'features.location.description': 'Comparte tus ubicaciones más recientes con tus contactos de emergencia para mayor seguridad.',
        'steps.title': 'Tres pasos para estar a salvo',
        'steps.contacts.title': 'Añade contactos de emergencia',
        'steps.contacts.description': 'Añade a las personas de confianza que deben recibir un aviso en caso de emergencia.',
        'steps.messages.title': 'Configura mensajes automáticos',
        'steps.messages.description': 'Configura mensajes automáticos con tu ubicación y estado para avisar a tus contactos de emergencia.',
        'steps.location.title': 'Permite compartir tu ubicación',
        'steps.location.description': 'Permite que RescMe comparta tu ubicación con tus contactos de emergencia durante una emergencia.',
        'download.tagline': 'Todas las personas merecen sentirse seguras.',
        'download.description': 'Descarga RescMe hoy y configura tu red de seguridad en menos de dos minutos.',
        'download.android': 'Descargar para Android',
        'footer.tagline': '© 2026 RescMe. La ayuda está a un toque de distancia.',
        'footer.terms': 'Términos',
        'footer.contact': 'Contacto',
    },
    'pt-BR': {
        'nav.home': 'Início',
        'nav.features': 'Recursos',
        'nav.howItWorks': 'Como funciona',
        'nav.getApp': 'Baixe o app',
        'hero.titlePrefix': 'A ajuda está a um toque ',
        'hero.titleAccent': 'de distância.',
        'hero.description': 'O RescMe conecta você aos seus contatos de emergência quando você mais precisa, com mensagens automáticas personalizáveis.',
        'hero.download': 'Baixe o app',
        'hero.imageAlt': 'Prévia do aplicativo RescMe',
        'features.title': 'Feito para os momentos que importam',
        'features.oneTap.title': 'SOS com um toque',
        'features.oneTap.description': 'Com um único toque, avise os serviços de emergência e seus contatos de confiança com sua localização em tempo real.',
        'features.messages.title': 'Mensagens personalizadas',
        'features.messages.description': 'Crie mensagens personalizadas para informar seus contatos de emergência com informações importantes.',
        'features.location.title': 'Compartilhamento de localização',
        'features.location.description': 'Compartilhe suas localizações mais recentes com seus contatos de emergência para mais segurança.',
        'steps.title': 'Três passos para sua segurança',
        'steps.contacts.title': 'Adicione contatos de emergência',
        'steps.contacts.description': 'Adicione as pessoas de confiança que devem ser avisadas em caso de emergência.',
        'steps.messages.title': 'Configure mensagens automáticas',
        'steps.messages.description': 'Configure mensagens automáticas com sua localização e status para avisar seus contatos de emergência.',
        'steps.location.title': 'Permita o compartilhamento de localização',
        'steps.location.description': 'Permita que o RescMe compartilhe sua localização com seus contatos de emergência durante uma emergência.',
        'download.tagline': 'Todas as pessoas merecem se sentir seguras.',
        'download.description': 'Baixe o RescMe hoje e configure sua rede de segurança em menos de dois minutos.',
        'download.android': 'Baixar para Android',
        'footer.tagline': '© 2026 RescMe. A ajuda está a um toque de distância.',
        'footer.terms': 'Termos',
        'footer.contact': 'Contato',
    },
};

const termsTranslations = {
    en: {
        'terms.pageTitle': 'Terms and Conditions',
        'terms.pageHeading': 'Terms of Service',
        'terms.documentHeading': 'Terms and Conditions',
        'terms.updatedLabel': 'Last updated:',
        'terms.updatedDate': 'October 14, 2026',
        'terms.s1.title': '1. Acceptance of Terms',
        'terms.s1.p1': 'By creating an account, accessing, or using RescMe ("the App"), you agree to these Terms and Conditions. If you do not agree with these terms, you must discontinue using the App.',
        'terms.s2.title': '2. Description of the Service',
        'terms.s2.p1': 'RescMe allows users to create messages, designate recipients, configure scheduled delivery, and, where supported and enabled, share location information with designated contacts.',
        'terms.s2.p2': 'The App is intended to help users communicate information to people they trust. It is not an emergency response service and does not guarantee that messages will be delivered, received, read, or acted upon within any specific timeframe.',
        'terms.s3.title': '3. Automatic Message Delivery',
        'terms.s3.p1': "Messages configured for automatic delivery will be scheduled for sending after the period or at the date and time defined by the user, subject to the App's functionality and technical availability.",
        'terms.s3.p2': 'The user is solely responsible for canceling a scheduled message within the App before its defined sending date and time if they no longer wish the message to be sent.',
        'terms.s3.p3': 'Users must not assume that a scheduled message will be canceled automatically because they stop using the App, uninstall it, lose access to their device, or lose their internet connection.',
        'terms.s3.p4': 'Cancellation requires a working internet connection and successful communication with the service. A cancellation request may not take effect if it cannot be received or processed before the scheduled message is sent.',
        'terms.s3.p5': 'The user is responsible for verifying that a cancellation has been successfully registered. If a message has already been sent, it may not be possible to recall it or prevent recipients from accessing it.',
        'terms.s4.title': '4. Internet Connectivity and Service Availability',
        'terms.s4.p1': "An active and functioning internet connection is required to use the App's online features, including creating or updating messages, managing contacts and settings, sharing location information, and canceling scheduled messages.",
        'terms.s4.p2': "The App's features may be unavailable or delayed due to network failures, server interruptions, maintenance, device limitations, or other technical circumstances.",
        'terms.s4.p3': 'The user acknowledges that connectivity issues may prevent an action from being completed within the expected timeframe. The App does not guarantee uninterrupted availability or successful execution of every requested operation.',
        'terms.s5.title': '5. Contacts and Location Sharing',
        'terms.s5.p1': "Location information may be shared with contacts designated by the user, subject to the user's settings, the availability of location data, and the applicable device permissions.",
        'terms.s5.p2': "Only contacts authorized by the user through the App's available settings are intended to have access to the most recent location information received by the service on the user's behalf. Location sharing is subject to geolocation being enabled and the relevant permissions and settings being active.",
        'terms.s5.p3': 'The App cannot guarantee that a location will always be current, accurate, or available. Location updates may be delayed, incomplete, or unavailable due to device settings, connectivity issues, operating system restrictions, or other technical limitations.',
        'terms.s5.p4': 'Users are responsible for reviewing their authorized contacts and location-sharing settings and keeping them up to date.',
        'terms.s6.title': '6. Privacy and Personal Data',
        'terms.s6.p1': 'The App is designed to keep information shared through the service private and restrict access according to its features, permissions, and user-defined settings.',
        'terms.s6.p2': 'To operate and maintain the service, the App may collect and process the following categories of information:',
        'terms.s6.p3': 'Information provided directly by the user through forms and other manual inputs.',
        'terms.s6.p4': 'Account and contact information necessary to provide the service.',
        'terms.s6.p5': 'Message content, scheduled delivery information, and user-defined settings.',
        'terms.s6.p6': "IP addresses and technical information about the user's device.",
        'terms.s6.p7': 'Location information, where the relevant feature is enabled and the necessary permissions are granted.',
        'terms.s6.p8': 'Technical logs and information necessary for security, troubleshooting, and service operation.',
        'terms.s6.p9': 'Personal data will be processed for purposes related to providing, maintaining, securing, and improving the service, as well as meeting applicable legal obligations.',
        'terms.s6.p10': "The App does not sell or share users' personal data or message content for commercial or advertising purposes. Information may be processed or disclosed where necessary to provide the service, including delivering messages to designated recipients, or where disclosure is legally required.",
        'terms.s6.p11': 'No online service can guarantee absolute security or confidentiality in every circumstance. Users should exercise care when creating messages or sharing sensitive information.',
        'terms.s7.title': '7. Message Recipients and Their Responsibilities',
        'terms.s7.p1': 'Messages sent through the App may not be immediately delivered, viewed, acknowledged, or answered by their recipients.',
        'terms.s7.p2': 'Each recipient is responsible for checking their communications and deciding whether and how to respond. The App does not guarantee that a recipient will be available, notice a message, understand its content, or take action in response to it.',
        'terms.s7.p3': "Users must not rely exclusively on RescMe as a means of obtaining urgent assistance, monitoring another person's safety, or ensuring that another person will take action.",
        'terms.s7.p4': 'Where immediate assistance is needed, users should contact the appropriate emergency services or other suitable assistance channels directly.',
        'terms.s8.title': '8. User Responsibility for Message Content',
        'terms.s8.p1': 'The user who creates a message is solely responsible for its content, accuracy, legality, and consequences.',
        'terms.s8.p2': 'Users must ensure that their messages do not violate applicable laws, infringe third-party rights, or contain misleading, abusive, threatening, fraudulent, or otherwise unlawful material.',
        'terms.s8.p3': 'The App does not endorse or assume responsibility for statements, instructions, claims, or other content created by users.',
        'terms.s8.p4': 'Users are strongly advised not to create or schedule messages that could cause financial loss, legal consequences, reputational harm, or other damage to themselves or others if sent unexpectedly or without appropriate context.',
        'terms.s8.p5': 'Users should carefully review message content, recipients, and delivery schedules before activating automatic delivery.',
        'terms.s9.title': '9. Use of Message Content and Artificial Intelligence',
        'terms.s9.p1': 'The content of messages submitted by users is not used to train artificial intelligence models.',
        'terms.s9.p2': 'This commitment concerns the use of message content for AI model training and does not prevent the technical processing necessary to store, manage, or deliver messages, protect the service, or comply with legal obligations.',
        'terms.s10.title': '10. Disclosure to Authorities and Legal Obligations',
        'terms.s10.p1': 'The App may disclose personal data or other relevant information to competent authorities when required by applicable law, a valid legal order, or another legally binding obligation.',
        'terms.s10.p2': 'Where legally permitted and appropriate, disclosures will be limited to the information required to comply with the relevant obligation.',
        'terms.s10.p3': 'Nothing in these Terms prevents the App from cooperating with lawful investigations or fulfilling applicable regulatory requirements.',
        'terms.s11.title': '11. Account Deletion and Data Retention',
        'terms.s11.p1': 'Users may request the deletion of their accounts through the available account-management features or other designated procedures.',
        'terms.s11.p2': 'Deleting an account does not necessarily result in the immediate and irreversible deletion of every associated record.',
        'terms.s11.p3': 'Certain information may be retained for the period required or permitted by applicable law, including for legal compliance, dispute resolution, fraud prevention, security, or the establishment, exercise, or defense of legal claims.',
        'terms.s11.p4': "Where information is no longer necessary and no legal basis for retention remains, it will be deleted or anonymized in accordance with applicable requirements and the service's retention practices.",
        'terms.s12.title': '12. No Commercial Use of Personal Data',
        'terms.s12.p1': 'Personal data and message content are not sold or shared for advertising, data brokerage, or other independent commercial purposes.',
        'terms.s12.p2': 'The service may process information as necessary to operate the App and fulfill user-requested functions, including transmitting messages to designated recipients and using service providers where necessary to deliver or maintain the service.',
        'terms.s13.title': '13. Limitation of Responsibility',
        'terms.s13.p1': 'To the extent permitted by applicable law, the App and its operators are not responsible for failures or delays caused by circumstances beyond their reasonable control, including network interruptions, device failures, unavailable recipients, inaccurate information provided by users, or third-party service disruptions.',
        'terms.s13.p2': 'The App does not guarantee that automatic messages will always be sent at the exact scheduled time, that location information will always be accurate, or that recipients will read or act upon messages.',
        'terms.s13.p3': 'Users remain responsible for their message content, selected recipients, scheduling decisions, cancellation requests, and use of the service.',
        'terms.s13.p4': 'Nothing in these Terms excludes or limits any liability or consumer right that cannot lawfully be excluded or limited under applicable law.',
        'terms.s14.title': '14. Changes to These Terms',
        'terms.s14.p1': 'These Terms may be updated from time to time to reflect changes to the App, its features, applicable laws, or operational practices.',
        'terms.s14.p2': 'The updated version will be made available through the App or another appropriate communication channel, together with its updated effective date.',
        'terms.s14.p3': 'Where required by applicable law, users will be notified of material changes and asked to provide any necessary consent.',
        'terms.s14.p4': 'To the extent permitted by applicable law, continued use of the App after updated Terms become effective constitutes acceptance of those changes. If a user does not agree with the updated Terms, they should discontinue using the App.',
        'terms.s15.title': '15. Applicable Law and Contact',
        'terms.s15.p1': 'These Terms are subject to applicable laws and regulations. Where applicable, mandatory consumer protection and data protection rights remain unaffected.',
        'terms.s15.p2': 'For questions, concerns, or requests relating to these Terms, privacy, or personal data, users should contact the service operator through the contact information made available within the App.',
        'terms.acknowledgement': 'By using RescMe, you acknowledge that you have read and understood these Terms and Conditions.',
    },
    es: {
        'terms.pageTitle': 'Términos y condiciones',
        'terms.pageHeading': 'Condiciones del servicio',
        'terms.documentHeading': 'Términos y condiciones',
        'terms.updatedLabel': 'Última actualización:',
        'terms.updatedDate': '14 de octubre de 2026',
        'terms.s1.title': '1. Aceptación de los términos',
        'terms.s1.p1': 'Al crear una cuenta, acceder a RescMe o utilizarlo («la aplicación»), aceptas estos Términos y condiciones. Si no estás de acuerdo con ellos, debes dejar de usar la aplicación.',
        'terms.s2.title': '2. Descripción del servicio',
        'terms.s2.p1': 'RescMe permite a los usuarios crear mensajes, designar destinatarios, programar su envío y, cuando la función esté disponible y activada, compartir información de ubicación con los contactos designados.',
        'terms.s2.p2': 'La aplicación está diseñada para ayudar a los usuarios a comunicar información a personas de su confianza. No es un servicio de respuesta ante emergencias y no garantiza que los mensajes se envíen, reciban, lean o atiendan dentro de un plazo determinado.',
        'terms.s3.title': '3. Envío automático de mensajes',
        'terms.s3.p1': 'Los mensajes configurados para el envío automático se programarán para enviarse después del período o en la fecha y hora que defina el usuario, sujeto al funcionamiento y la disponibilidad técnica de la aplicación.',
        'terms.s3.p2': 'El usuario es el único responsable de cancelar en la aplicación un mensaje programado antes de la fecha y hora de envío establecidas si ya no desea que se envíe.',
        'terms.s3.p3': 'Los usuarios no deben suponer que un mensaje programado se cancelará automáticamente por dejar de usar la aplicación, desinstalarla, perder el acceso al dispositivo o perder la conexión a Internet.',
        'terms.s3.p4': 'Para cancelar se necesita una conexión a Internet activa y una comunicación correcta con el servicio. La solicitud de cancelación podría no surtir efecto si no se recibe o procesa antes del envío programado del mensaje.',
        'terms.s3.p5': 'El usuario debe verificar que la cancelación se haya registrado correctamente. Si el mensaje ya se envió, quizá no sea posible retirarlo ni impedir que los destinatarios accedan a él.',
        'terms.s4.title': '4. Conexión a Internet y disponibilidad del servicio',
        'terms.s4.p1': 'Se necesita una conexión a Internet activa y funcional para usar las funciones en línea de la aplicación, como crear o actualizar mensajes, administrar contactos y ajustes, compartir información de ubicación y cancelar mensajes programados.',
        'terms.s4.p2': 'Las funciones de la aplicación podrían no estar disponibles o sufrir demoras debido a fallos de red, interrupciones del servidor, mantenimiento, limitaciones del dispositivo u otras circunstancias técnicas.',
        'terms.s4.p3': 'El usuario reconoce que los problemas de conexión pueden impedir que una acción se complete dentro del plazo previsto. La aplicación no garantiza su disponibilidad ininterrumpida ni la ejecución correcta de todas las operaciones solicitadas.',
        'terms.s5.title': '5. Contactos y uso compartido de la ubicación',
        'terms.s5.p1': 'La información de ubicación podrá compartirse con los contactos designados por el usuario, según sus ajustes, la disponibilidad de los datos de ubicación y los permisos aplicables del dispositivo.',
        'terms.s5.p2': 'Se prevé que solo los contactos autorizados por el usuario mediante los ajustes disponibles de la aplicación puedan acceder a la información de ubicación más reciente que el servicio haya recibido en nombre del usuario. Para compartir la ubicación, deben estar activadas la geolocalización y las configuraciones y permisos pertinentes.',
        'terms.s5.p3': 'La aplicación no puede garantizar que la ubicación esté siempre actualizada, sea precisa o esté disponible. Las actualizaciones pueden demorarse, ser incompletas o no estar disponibles debido a los ajustes del dispositivo, problemas de conexión, restricciones del sistema operativo u otras limitaciones técnicas.',
        'terms.s5.p4': 'Los usuarios son responsables de revisar sus contactos autorizados y los ajustes para compartir la ubicación, y de mantenerlos actualizados.',
        'terms.s6.title': '6. Privacidad y datos personales',
        'terms.s6.p1': 'La aplicación está diseñada para mantener privada la información compartida mediante el servicio y restringir el acceso de acuerdo con sus funciones, permisos y ajustes definidos por el usuario.',
        'terms.s6.p2': 'Para operar y mantener el servicio, la aplicación puede recopilar y tratar las siguientes categorías de información:',
        'terms.s6.p3': 'Información que el usuario proporciona directamente mediante formularios y otras entradas manuales.',
        'terms.s6.p4': 'Información de la cuenta y de los contactos necesaria para prestar el servicio.',
        'terms.s6.p5': 'Contenido de los mensajes, información sobre los envíos programados y ajustes definidos por el usuario.',
        'terms.s6.p6': 'Direcciones IP e información técnica sobre el dispositivo del usuario.',
        'terms.s6.p7': 'Información de ubicación, cuando la función correspondiente está activada y se conceden los permisos necesarios.',
        'terms.s6.p8': 'Registros técnicos e información necesarios para la seguridad, la resolución de problemas y el funcionamiento del servicio.',
        'terms.s6.p9': 'Los datos personales se tratarán con fines relacionados con la prestación, el mantenimiento, la protección y la mejora del servicio, así como para cumplir las obligaciones legales aplicables.',
        'terms.s6.p10': 'La aplicación no vende ni comparte datos personales ni contenido de mensajes de los usuarios con fines comerciales o publicitarios. La información podrá tratarse o divulgarse cuando sea necesario para prestar el servicio, incluido el envío de mensajes a los destinatarios designados, o cuando la ley exija su divulgación.',
        'terms.s6.p11': 'Ningún servicio en línea puede garantizar seguridad o confidencialidad absolutas en todas las circunstancias. Los usuarios deben actuar con prudencia al crear mensajes o compartir información sensible.',
        'terms.s7.title': '7. Destinatarios de los mensajes y sus responsabilidades',
        'terms.s7.p1': 'Es posible que los destinatarios no reciban, vean, confirmen ni respondan de inmediato a los mensajes enviados mediante la aplicación.',
        'terms.s7.p2': 'Cada destinatario es responsable de revisar sus comunicaciones y decidir si responde y cómo hacerlo. La aplicación no garantiza que el destinatario esté disponible, vea el mensaje, comprenda su contenido o actúe en consecuencia.',
        'terms.s7.p3': 'Los usuarios no deben depender exclusivamente de RescMe para obtener ayuda urgente, vigilar la seguridad de otra persona o asegurarse de que otra persona actúe.',
        'terms.s7.p4': 'Si se necesita ayuda inmediata, los usuarios deben ponerse en contacto directamente con los servicios de emergencia correspondientes u otros canales de asistencia adecuados.',
        'terms.s8.title': '8. Responsabilidad del usuario sobre el contenido de los mensajes',
        'terms.s8.p1': 'El usuario que crea un mensaje es el único responsable de su contenido, exactitud, legalidad y consecuencias.',
        'terms.s8.p2': 'Los usuarios deben asegurarse de que sus mensajes no infrinjan las leyes aplicables ni los derechos de terceros y no contengan material engañoso, abusivo, amenazante, fraudulento o ilegal por otros motivos.',
        'terms.s8.p3': 'La aplicación no respalda ni asume responsabilidad por las declaraciones, instrucciones, afirmaciones u otros contenidos creados por los usuarios.',
        'terms.s8.p4': 'Se recomienda encarecidamente a los usuarios que no creen ni programen mensajes que puedan causarles a ellos o a otras personas pérdidas económicas, consecuencias legales, daños a la reputación u otros perjuicios si se envían inesperadamente o sin el contexto adecuado.',
        'terms.s8.p5': 'Antes de activar el envío automático, los usuarios deben revisar cuidadosamente el contenido de los mensajes, los destinatarios y los horarios de envío.',
        'terms.s9.title': '9. Uso del contenido de los mensajes y de la inteligencia artificial',
        'terms.s9.p1': 'El contenido de los mensajes enviados por los usuarios no se utiliza para entrenar modelos de inteligencia artificial.',
        'terms.s9.p2': 'Este compromiso se refiere al uso del contenido de los mensajes para entrenar modelos de IA y no impide el tratamiento técnico necesario para almacenar, administrar o entregar mensajes, proteger el servicio o cumplir obligaciones legales.',
        'terms.s10.title': '10. Divulgación a las autoridades y obligaciones legales',
        'terms.s10.p1': 'La aplicación podrá divulgar datos personales u otra información pertinente a las autoridades competentes cuando lo exijan la legislación aplicable, una orden judicial válida u otra obligación jurídicamente vinculante.',
        'terms.s10.p2': 'Cuando la ley lo permita y resulte apropiado, las divulgaciones se limitarán a la información necesaria para cumplir la obligación correspondiente.',
        'terms.s10.p3': 'Nada de lo dispuesto en estos Términos impide que la aplicación coopere en investigaciones legales o cumpla los requisitos reglamentarios aplicables.',
        'terms.s11.title': '11. Eliminación de cuentas y conservación de datos',
        'terms.s11.p1': 'Los usuarios pueden solicitar la eliminación de sus cuentas mediante las funciones disponibles de administración de cuentas u otros procedimientos designados.',
        'terms.s11.p2': 'Eliminar una cuenta no implica necesariamente la eliminación inmediata e irreversible de todos los registros asociados.',
        'terms.s11.p3': 'Cierta información podrá conservarse durante el período exigido o permitido por la legislación aplicable, por ejemplo, para cumplir la ley, resolver disputas, prevenir fraudes, proteger la seguridad o establecer, ejercer o defender reclamaciones legales.',
        'terms.s11.p4': 'Cuando la información deje de ser necesaria y ya no exista una base legal para conservarla, se eliminará o anonimizará de acuerdo con los requisitos aplicables y las prácticas de conservación del servicio.',
        'terms.s12.title': '12. Prohibición del uso comercial de datos personales',
        'terms.s12.p1': 'Los datos personales y el contenido de los mensajes no se venden ni comparten con fines publicitarios, de intermediación de datos u otros fines comerciales independientes.',
        'terms.s12.p2': 'El servicio podrá tratar información cuando sea necesario para operar la aplicación y cumplir las funciones solicitadas por el usuario, incluido transmitir mensajes a los destinatarios designados y recurrir a proveedores de servicios cuando sea necesario para prestar o mantener el servicio.',
        'terms.s13.title': '13. Limitación de responsabilidad',
        'terms.s13.p1': 'En la medida permitida por la legislación aplicable, la aplicación y sus operadores no son responsables de fallos o demoras causados por circunstancias que escapen a su control razonable, como interrupciones de red, fallos del dispositivo, destinatarios no disponibles, información inexacta proporcionada por los usuarios o interrupciones de servicios de terceros.',
        'terms.s13.p2': 'La aplicación no garantiza que los mensajes automáticos se envíen siempre exactamente a la hora programada, que la información de ubicación sea siempre precisa ni que los destinatarios lean los mensajes o actúen en consecuencia.',
        'terms.s13.p3': 'Los usuarios siguen siendo responsables del contenido de sus mensajes, los destinatarios seleccionados, las decisiones de programación, las solicitudes de cancelación y el uso del servicio.',
        'terms.s13.p4': 'Nada de lo dispuesto en estos Términos excluye o limita responsabilidades ni derechos de los consumidores que no puedan excluirse o limitarse legalmente conforme a la legislación aplicable.',
        'terms.s14.title': '14. Cambios en estos Términos',
        'terms.s14.p1': 'Estos Términos podrán actualizarse periódicamente para reflejar cambios en la aplicación, sus funciones, la legislación aplicable o las prácticas operativas.',
        'terms.s14.p2': 'La versión actualizada estará disponible en la aplicación o a través de otro canal de comunicación adecuado, junto con su nueva fecha de entrada en vigor.',
        'terms.s14.p3': 'Cuando la legislación aplicable lo exija, se notificará a los usuarios sobre los cambios sustanciales y se les solicitará el consentimiento necesario.',
        'terms.s14.p4': 'En la medida permitida por la legislación aplicable, seguir utilizando la aplicación después de la entrada en vigor de los Términos actualizados implica aceptar esos cambios. Si un usuario no está de acuerdo con los Términos actualizados, debe dejar de usar la aplicación.',
        'terms.s15.title': '15. Legislación aplicable y contacto',
        'terms.s15.p1': 'Estos Términos están sujetos a las leyes y normativas aplicables. Cuando corresponda, se mantienen intactos los derechos obligatorios de protección al consumidor y de protección de datos.',
        'terms.s15.p2': 'Si tienen preguntas, inquietudes o solicitudes relacionadas con estos Términos, la privacidad o los datos personales, los usuarios deben ponerse en contacto con el operador del servicio mediante la información de contacto disponible en la aplicación.',
        'terms.acknowledgement': 'Al utilizar RescMe, reconoces que has leído y comprendido estos Términos y condiciones.',
    },
    'pt-BR': {
        'terms.pageTitle': 'Termos e Condições',
        'terms.pageHeading': 'Termos de Serviço',
        'terms.documentHeading': 'Termos e Condições',
        'terms.updatedLabel': 'Última atualização:',
        'terms.updatedDate': '14 de outubro de 2026',
        'terms.s1.title': '1. Aceitação dos Termos',
        'terms.s1.p1': 'Ao criar uma conta, acessar ou usar o RescMe ("o Aplicativo"), você concorda com estes Termos e Condições. Se não concordar com estes termos, deverá deixar de usar o Aplicativo.',
        'terms.s2.title': '2. Descrição do Serviço',
        'terms.s2.p1': 'O RescMe permite que os usuários criem mensagens, indiquem destinatários, configurem o envio agendado e, quando disponível e ativado, compartilhem informações de localização com os contatos indicados.',
        'terms.s2.p2': 'O Aplicativo foi desenvolvido para ajudar os usuários a comunicar informações a pessoas em quem confiam. Ele não é um serviço de resposta a emergências e não garante que as mensagens serão enviadas, recebidas, lidas ou atendidas em qualquer prazo específico.',
        'terms.s3.title': '3. Envio Automático de Mensagens',
        'terms.s3.p1': 'As mensagens configuradas para envio automático serão agendadas para envio após o período ou na data e horário definidos pelo usuário, conforme a funcionalidade e a disponibilidade técnica do Aplicativo.',
        'terms.s3.p2': 'O usuário é o único responsável por cancelar no Aplicativo uma mensagem agendada antes da data e do horário de envio definidos, caso não queira mais que ela seja enviada.',
        'terms.s3.p3': 'Os usuários não devem presumir que uma mensagem agendada será cancelada automaticamente caso deixem de usar o Aplicativo, o desinstalem, percam acesso ao dispositivo ou fiquem sem conexão com a internet.',
        'terms.s3.p4': 'O cancelamento exige uma conexão com a internet funcionando e comunicação bem-sucedida com o serviço. A solicitação de cancelamento poderá não entrar em vigor se não puder ser recebida ou processada antes do envio agendado da mensagem.',
        'terms.s3.p5': 'O usuário é responsável por verificar se o cancelamento foi registrado com sucesso. Se a mensagem já tiver sido enviada, talvez não seja possível recolhê-la nem impedir que os destinatários a acessem.',
        'terms.s4.title': '4. Conexão com a Internet e Disponibilidade do Serviço',
        'terms.s4.p1': 'É necessária uma conexão ativa e funcional com a internet para usar os recursos online do Aplicativo, incluindo criar ou atualizar mensagens, gerenciar contatos e configurações, compartilhar informações de localização e cancelar mensagens agendadas.',
        'terms.s4.p2': 'Os recursos do Aplicativo podem ficar indisponíveis ou sofrer atrasos devido a falhas de rede, interrupções no servidor, manutenção, limitações do dispositivo ou outras circunstâncias técnicas.',
        'terms.s4.p3': 'O usuário reconhece que problemas de conexão podem impedir a conclusão de uma ação no prazo esperado. O Aplicativo não garante disponibilidade ininterrupta nem a execução bem-sucedida de todas as operações solicitadas.',
        'terms.s5.title': '5. Contatos e Compartilhamento de Localização',
        'terms.s5.p1': 'As informações de localização poderão ser compartilhadas com os contatos indicados pelo usuário, de acordo com as configurações do usuário, a disponibilidade dos dados de localização e as permissões aplicáveis do dispositivo.',
        'terms.s5.p2': 'Somente os contatos autorizados pelo usuário nas configurações disponíveis do Aplicativo devem ter acesso às informações de localização mais recentes recebidas pelo serviço em nome do usuário. O compartilhamento de localização depende da geolocalização estar ativada e das permissões e configurações pertinentes estarem ativas.',
        'terms.s5.p3': 'O Aplicativo não pode garantir que a localização estará sempre atualizada, precisa ou disponível. As atualizações de localização podem sofrer atrasos, ser incompletas ou ficar indisponíveis devido às configurações do dispositivo, problemas de conexão, restrições do sistema operacional ou outras limitações técnicas.',
        'terms.s5.p4': 'Os usuários são responsáveis por revisar e manter atualizados os contatos autorizados e as configurações de compartilhamento de localização.',
        'terms.s6.title': '6. Privacidade e Dados Pessoais',
        'terms.s6.p1': 'O Aplicativo foi desenvolvido para manter privadas as informações compartilhadas pelo serviço e restringir o acesso de acordo com seus recursos, permissões e configurações definidas pelo usuário.',
        'terms.s6.p2': 'Para operar e manter o serviço, o Aplicativo poderá coletar e tratar as seguintes categorias de informações:',
        'terms.s6.p3': 'Informações fornecidas diretamente pelo usuário por meio de formulários e outras inserções manuais.',
        'terms.s6.p4': 'Informações da conta e dos contatos necessárias para prestar o serviço.',
        'terms.s6.p5': 'Conteúdo das mensagens, informações de envio agendado e configurações definidas pelo usuário.',
        'terms.s6.p6': 'Endereços IP e informações técnicas sobre o dispositivo do usuário.',
        'terms.s6.p7': 'Informações de localização, quando o recurso correspondente estiver ativado e as permissões necessárias forem concedidas.',
        'terms.s6.p8': 'Registros técnicos e informações necessárias para segurança, solução de problemas e operação do serviço.',
        'terms.s6.p9': 'Os dados pessoais serão tratados para fins relacionados à prestação, manutenção, proteção e melhoria do serviço, bem como ao cumprimento das obrigações legais aplicáveis.',
        'terms.s6.p10': 'O Aplicativo não vende nem compartilha dados pessoais dos usuários ou conteúdo de mensagens para fins comerciais ou publicitários. As informações poderão ser tratadas ou divulgadas quando necessário para prestar o serviço, inclusive para entregar mensagens aos destinatários indicados, ou quando a divulgação for exigida por lei.',
        'terms.s6.p11': 'Nenhum serviço online pode garantir segurança ou confidencialidade absolutas em todas as circunstâncias. Os usuários devem ter cuidado ao criar mensagens ou compartilhar informações confidenciais.',
        'terms.s7.title': '7. Destinatários das Mensagens e Suas Responsabilidades',
        'terms.s7.p1': 'As mensagens enviadas pelo Aplicativo podem não ser entregues, visualizadas, confirmadas ou respondidas imediatamente pelos destinatários.',
        'terms.s7.p2': 'Cada destinatário é responsável por verificar suas comunicações e decidir se e como responder. O Aplicativo não garante que o destinatário estará disponível, verá a mensagem, compreenderá seu conteúdo ou tomará alguma providência em resposta.',
        'terms.s7.p3': 'Os usuários não devem depender exclusivamente do RescMe para obter assistência urgente, monitorar a segurança de outra pessoa ou garantir que outra pessoa tomará alguma providência.',
        'terms.s7.p4': 'Quando for necessária assistência imediata, os usuários deverão entrar em contato diretamente com os serviços de emergência adequados ou outros canais de assistência apropriados.',
        'terms.s8.title': '8. Responsabilidade do Usuário pelo Conteúdo das Mensagens',
        'terms.s8.p1': 'O usuário que cria uma mensagem é o único responsável por seu conteúdo, precisão, legalidade e consequências.',
        'terms.s8.p2': 'Os usuários devem garantir que suas mensagens não violem as leis aplicáveis, não infrinjam direitos de terceiros e não contenham material enganoso, abusivo, ameaçador, fraudulento ou ilegal de qualquer outra forma.',
        'terms.s8.p3': 'O Aplicativo não endossa nem assume responsabilidade por declarações, instruções, alegações ou outros conteúdos criados pelos usuários.',
        'terms.s8.p4': 'Recomendamos fortemente que os usuários não criem nem agendem mensagens que possam causar prejuízo financeiro, consequências legais, danos à reputação ou outros prejuízos a si mesmos ou a terceiros caso sejam enviadas inesperadamente ou sem o contexto adequado.',
        'terms.s8.p5': 'Os usuários devem revisar cuidadosamente o conteúdo das mensagens, os destinatários e os horários de envio antes de ativar o envio automático.',
        'terms.s9.title': '9. Uso do Conteúdo das Mensagens e Inteligência Artificial',
        'terms.s9.p1': 'O conteúdo das mensagens enviadas pelos usuários não é usado para treinar modelos de inteligência artificial.',
        'terms.s9.p2': 'Este compromisso diz respeito ao uso do conteúdo das mensagens para treinamento de modelos de IA e não impede o processamento técnico necessário para armazenar, gerenciar ou entregar mensagens, proteger o serviço ou cumprir obrigações legais.',
        'terms.s10.title': '10. Divulgação às Autoridades e Obrigações Legais',
        'terms.s10.p1': 'O Aplicativo poderá divulgar dados pessoais ou outras informações relevantes às autoridades competentes quando exigido pela legislação aplicável, por uma ordem judicial válida ou por outra obrigação legalmente vinculante.',
        'terms.s10.p2': 'Quando permitido por lei e apropriado, as divulgações serão limitadas às informações necessárias para cumprir a obrigação pertinente.',
        'terms.s10.p3': 'Nada nestes Termos impede o Aplicativo de cooperar com investigações legais ou cumprir requisitos regulatórios aplicáveis.',
        'terms.s11.title': '11. Exclusão de Conta e Retenção de Dados',
        'terms.s11.p1': 'Os usuários podem solicitar a exclusão de suas contas pelos recursos disponíveis de gerenciamento de conta ou por outros procedimentos indicados.',
        'terms.s11.p2': 'A exclusão de uma conta não resulta necessariamente na exclusão imediata e irreversível de todos os registros associados.',
        'terms.s11.p3': 'Determinadas informações poderão ser retidas pelo período exigido ou permitido pela legislação aplicável, inclusive para cumprimento da lei, resolução de disputas, prevenção de fraudes, segurança ou para estabelecer, exercer ou defender direitos em processos judiciais.',
        'terms.s11.p4': 'Quando as informações deixarem de ser necessárias e não houver mais fundamento legal para sua retenção, elas serão excluídas ou anonimizadas de acordo com os requisitos aplicáveis e as práticas de retenção do serviço.',
        'terms.s12.title': '12. Proibição de Uso Comercial de Dados Pessoais',
        'terms.s12.p1': 'Os dados pessoais e o conteúdo das mensagens não são vendidos nem compartilhados para publicidade, comercialização de dados ou outras finalidades comerciais independentes.',
        'terms.s12.p2': 'O serviço poderá tratar informações conforme necessário para operar o Aplicativo e cumprir funções solicitadas pelo usuário, incluindo transmitir mensagens aos destinatários indicados e utilizar prestadores de serviços quando necessário para prestar ou manter o serviço.',
        'terms.s13.title': '13. Limitação de Responsabilidade',
        'terms.s13.p1': 'Na medida permitida pela legislação aplicável, o Aplicativo e seus operadores não são responsáveis por falhas ou atrasos causados por circunstâncias fora de seu controle razoável, incluindo interrupções de rede, falhas no dispositivo, indisponibilidade dos destinatários, informações incorretas fornecidas pelos usuários ou interrupções em serviços de terceiros.',
        'terms.s13.p2': 'O Aplicativo não garante que mensagens automáticas serão sempre enviadas exatamente no horário agendado, que as informações de localização serão sempre precisas ou que os destinatários lerão ou agirão com base nas mensagens.',
        'terms.s13.p3': 'Os usuários continuam responsáveis pelo conteúdo de suas mensagens, pelos destinatários escolhidos, pelas decisões de agendamento, pelas solicitações de cancelamento e pelo uso do serviço.',
        'terms.s13.p4': 'Nada nestes Termos exclui ou limita qualquer responsabilidade ou direito do consumidor que não possa ser legalmente excluído ou limitado nos termos da legislação aplicável.',
        'terms.s14.title': '14. Alterações nestes Termos',
        'terms.s14.p1': 'Estes Termos poderão ser atualizados periodicamente para refletir alterações no Aplicativo, em seus recursos, nas leis aplicáveis ou nas práticas operacionais.',
        'terms.s14.p2': 'A versão atualizada será disponibilizada pelo Aplicativo ou por outro canal de comunicação apropriado, juntamente com sua nova data de vigência.',
        'terms.s14.p3': 'Quando exigido pela legislação aplicável, os usuários serão notificados sobre alterações relevantes e solicitados a fornecer qualquer consentimento necessário.',
        'terms.s14.p4': 'Na medida permitida pela legislação aplicável, continuar usando o Aplicativo após a entrada em vigor dos Termos atualizados constitui aceitação dessas alterações. Se o usuário não concordar com os Termos atualizados, deverá deixar de usar o Aplicativo.',
        'terms.s15.title': '15. Legislação Aplicável e Contato',
        'terms.s15.p1': 'Estes Termos estão sujeitos às leis e aos regulamentos aplicáveis. Quando pertinente, os direitos obrigatórios de proteção do consumidor e de proteção de dados permanecem inalterados.',
        'terms.s15.p2': 'Em caso de dúvidas, preocupações ou solicitações relacionadas a estes Termos, à privacidade ou aos dados pessoais, os usuários deverão entrar em contato com o operador do serviço pelas informações de contato disponibilizadas no Aplicativo.',
        'terms.acknowledgement': 'Ao usar o RescMe, você reconhece que leu e compreendeu estes Termos e Condições.',
    },
};

const supportedLanguages = Object.keys(translations);
const preferredLanguages = navigator.languages?.length
    ? navigator.languages
    : [navigator.language];

const detectedLanguage = preferredLanguages
    .map((preferredLanguage) => preferredLanguage.toLowerCase())
    .map((preferredLanguage) => {
        if (preferredLanguage.startsWith('pt')) {
            return 'pt-BR';
        }

        if (preferredLanguage.startsWith('es')) {
            return 'es';
        }

        if (preferredLanguage.startsWith('en')) {
            return 'en';
        }

        return null;
    })
    .find((preferredLanguage) => supportedLanguages.includes(preferredLanguage)) ?? 'en';

const storedLanguage = (() => {
    try {
        return localStorage.getItem('language');
    } catch {
        return null;
    }
})();

const language = supportedLanguages.includes(storedLanguage) ? storedLanguage : detectedLanguage;

document.documentElement.lang = language;

const translate = (key) => {
    const translation = translations[language][key] ?? termsTranslations[language][key];

    if (!translation) {
        throw new Error(`Missing ${language} translation for "${key}".`);
    }

    return translation;
};

document.querySelectorAll('[data-i18n]').forEach((element) => {
    element.textContent = translate(element.dataset.i18n);
});

document.querySelectorAll('[data-i18n-alt]').forEach((element) => {
    element.alt = translate(element.dataset.i18nAlt);
});

const languageSwitcher = document.querySelector('[data-language-switcher]');

if (languageSwitcher) {
    languageSwitcher.querySelector('[data-language-current]').textContent = language.split('-')[0].toUpperCase();

    languageSwitcher.querySelectorAll('[data-language-option]').forEach((option) => {
        const isCurrent = option.dataset.languageOption === language;

        option.setAttribute('aria-current', isCurrent ? 'true' : 'false');
        option.classList.toggle('font-bold', isCurrent);

        option.addEventListener('click', () => {
            try {
                localStorage.setItem('language', option.dataset.languageOption);
            } catch {
                // Storage unavailable; the choice only applies until reload.
            }

            window.location.reload();
        });
    });

    document.addEventListener('click', (event) => {
        if (!languageSwitcher.contains(event.target)) {
            languageSwitcher.removeAttribute('open');
        }
    });
}
